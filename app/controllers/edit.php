<?php 

Class Edit extends Controller
{
	public function index()
	{
		if(isset($_GET['id'])){
			$data['page_title'] = "Profile";

			$User = $this->load_model('User');
			$user_data = $User->check_login(true);

			if(is_object($user_data)){
				$user_role = $User->check_login(true, ['admin']);

				if ($user_role || $user_data->id == $_GET['id']){
					if($_SERVER['REQUEST_METHOD'] == "POST"){		
						$user = $this->load_model("User");
						$user->edit($_POST);
					}

					$data['user_data'] = $User->get_user($_GET['id']);
					$this->view("edit", $data);
				} else{
					header("Location: " . ROOT . "home");
				}
			}
		} else{
			header("Location: " . ROOT . "home");
		}
	}

}