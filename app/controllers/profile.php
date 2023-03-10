<?php 

Class Profile extends Controller
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
			        $data['user_data'] = $User->get_user($_GET['id']);
                    $this->view("profile", $data);
                } else{
                    header("Location: " . ROOT . "home");
                }
            }
        } else{
            header("Location: " . ROOT . "home");
        }
	}

}