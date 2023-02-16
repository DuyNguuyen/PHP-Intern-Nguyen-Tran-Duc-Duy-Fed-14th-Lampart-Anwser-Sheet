<?php 

Class Home extends Controller
{
	public function index()
	{	
		$data['page_title'] = "Home";
		$search = false;
		
		if(isset($_GET['find']))
		{
			$find = addslashes($_GET['find']);
			$search = true;
		}

		$User = $this->load_model('User');
		$user_data = $User->check_login(true);

		if(is_object($user_data)){
			$data['user_data'] = $user_data;

			$user_role = $User->check_login(false, ["admin"]);
			if(is_object($user_role)){
				$db = Database::newInstance();

				if($search){
					$arr['find'] = "%". $find . "%";
					$users = $db->read("select * from users where id like :find or name like :find or email like :find",$arr);
				}else{
					$users = $User->get_users();
				}		
			}else{
				$users[] = $data['user_data'];
			}
		}
		
		$data['users'] = $users;
		$this->view("home", $data);
	}
}