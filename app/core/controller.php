<?php 

Class Controller
{
	//load view with given data
	public function view($path, $data = [])
	{

		if(is_array($data)){
 			extract($data);
		}

		if(file_exists("../app/views/" . $path . ".php")){
			include "../app/views/" . $path . ".php";
		}else{
			include "../app/views/" . "404.php";
		}
	}

	public function load_model($model)
	{

		if(file_exists("../app/models/" . strtolower($model) . ".class.php")){
			include_once "../app/models/" . strtolower($model) . ".class.php";
			return $a = new $model();
		}

		return false;
	}


}