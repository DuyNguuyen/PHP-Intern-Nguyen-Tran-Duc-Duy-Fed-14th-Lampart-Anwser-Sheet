<?php 

Class Delete extends Controller
{

	public function index()
	{	
        if(isset($_GET['id'])){
            $User = $this->load_model('User');
		    $user_data = $User->check_login(true);
            if(is_object($user_data)){
                $user_role = $User->check_login(true, ['admin']);
                if ($user_role || $user_data->id == $_GET['id']){
                    $User->delete($_GET['id']);
                }else{
                    header("Location: " . ROOT . "home");
                }
            }
        } else{
            header("Location: " . ROOT . "home");
        }
	}
}