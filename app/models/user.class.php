<?php 

Class User 
{
	private $error = "";

	public function signup($POST)
	{
		$data = array();
		$db = Database::getInstance();

		$data['name'] 		= trim($POST['name']);
		$data['email'] 		= trim($POST['email']);
		$data['password'] 	= trim($POST['password']);
		$password2 			= trim($POST['password2']);

		if(empty($data['email']) || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data['email'])){
			$this->error .= "Please enter a valid email <br>";
		}

		if(empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])){
			$this->error .= "Please enter a valid name <br>";
		}

		if($data['password'] !== $password2){
			$this->error .= "Passwords do not match <br>";
		}

		if(strlen($data['password']) < 4){
			$this->error .= "Password must be atleast 4 characters long <br>";
		}

		//check if email already exists
		$sql = "select * from users where email = :email limit 1";
		$arr['email'] = $data['email'];
		$check = $db->read($sql,$arr);
		if(is_array($check)){
			$this->error .= "That email is already in use <br>";
		}

		$data['token'] = $this->get_random_string_max(80);

		if($this->error == ""){
			$data['role'] = "user";
			$data['password'] = hash('sha1',$data['password']);

			$query = "insert into users (token,name,email,password,role) values (:token,:name,:email,:password,:role)";
			$result = $db->write($query,$data);

			if($result){
				header("Location: " . ROOT . "login");
				die;
			}
		}

		$_SESSION['error'] = $this->error;

	}

	public function login($POST)
	{
		$data = array();
		$db = Database::getInstance();

 		$data['email'] 		= trim($POST['email']);
		$data['password'] 	= trim($POST['password']);
 
		if(empty($data['email']) || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data['email'])){
			$this->error .= "Please enter a valid email <br>";
		}
 
 		if(strlen($data['password']) < 4){
			$this->error .= "Password must be atleast 4 characters long <br>";
		}

  		if($this->error == ""){
			$data['password'] = hash('sha1',$data['password']);

			//check if email already exists
			$sql = "select * from users where email = :email && password = :password limit 1";
 			$result = $db->read($sql,$data);

			if(is_array($result)){
				$_SESSION['token'] = $result[0]->token;

				if (isset($POST["remember_me"])) {
					setcookie("email", trim($POST['email']), time()+6*3600);
					setcookie("password", trim($POST['password']), time()+6*3600);
				} else {
					setcookie("email", '', time()-1000);
					setcookie("password", '', time()-1000);					
				}

				header("Location: " . ROOT . "home");
				die;
			} else{			
				$this->error .= "Wrong email or password <br>";
			}
		}

		$_SESSION['error'] = $this->error;
	}

	public function get_user($id)
	{
		$db = Database::newInstance();

		$arr['id'] = addslashes($id);
		$query = "select id,name,email,role from users where id = :id limit 1";

		$result = $db->read($query,$arr);
		
		if(is_array($result))
		{
			return $result[0];
		}

		return false;
	}

	public function get_users()
	{
		$db = Database::newInstance();

		$query = "select id,name,email,role from users";
		$result = $db->read($query);
		
		if(is_array($result))
		{
			return $result;
		}

		return false;
	}

	public function check_login($redirect = false, $allowed = array())
	{	
		$db = Database::newInstance();

		if(count($allowed) > 0){	
			$arr['token'] = addslashes($_SESSION['token']);
			$query = "select * from users where token = :token limit 1";
			$result = $db->read($query,$arr);

			if(is_array($result)){
				$result = $result[0];
				if(in_array($result->role, $allowed)){
					return $result;
				}
			}
		}else{
	 		if(isset($_SESSION['token'])){
				$arr['token'] = $_SESSION['token'];
				$query = "select * from users where token = :token limit 1";

				$result = $db->read($query,$arr);
				
				if(is_array($result)){
					return $result[0];
				}
			}

			if($redirect){
				header("Location: " . ROOT . "login");
				die;
			}
		}

		return false;
	}

	public function edit($POST)
	{
		$data = array();
		$db = Database::newInstance();

		$data['id']         = (int)trim($POST['id']);
		$data['name'] 		= trim($POST['name']);
		$data['email'] 		= trim($POST['email']);

		if(empty($data['email']) || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data['email'])){
			$this->error .= "Please enter a valid email <br>";
		}

		if(empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])){
			$this->error .= "Please enter a valid name <br>";
		}

		//check if email already exists
		$sql = "select * from users where email = :email and id <> :id limit 1";
		$arr['email'] = $data['email'];
		$arr['id']    = $data['id'];
		$check = $db->read($sql,$arr);
		if(is_array($check)){
			$this->error .= "That email is already in use <br>";
		}

		if($this->error == ""){
			$query ="update users set name = :name, email = :email where id = :id limit 1";
			$result = $db->write($query,$data);

			if($result){
				header("Location: " . ROOT . "home");
				die;
			}
		}

		$_SESSION['error'] = $this->error;
	}

	public function logout()
	{
		if(isset($_SESSION['token'])){
			unset($_SESSION['token']);
		}

		header("Location: " . ROOT . "home");
		die;
	}

	public function delete($id)
	{
		$DB = Database::newInstance();
		$id = (int)$id;
		$query = "delete from users where id = '$id' limit 1";
		$DB->write($query);
		header("Location: " . ROOT . "home");
	}

	private function get_random_string_max($length) {
		$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$text = "";

		$length = rand(4,$length);

		for($i=0;$i<$length;$i++) {

			$random = rand(0,61);
			
			$text .= $array[$random];

		}

		return $text;
	}
}