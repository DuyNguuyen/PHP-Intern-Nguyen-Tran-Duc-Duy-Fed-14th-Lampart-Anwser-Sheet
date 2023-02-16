<?php 
define("WEBSITE_TITLE", 'LOGIN SYSTEM');
define('DEBUG', true);

define('DB_NAME', "users_db"); //database name
define('DB_USER', "root");	//database user
define('DB_PASS', "");		//database password
define('DB_TYPE', "mysql"); //database type
define('DB_HOST', "localhost");	//database host

if(DEBUG){
	ini_set('display_errors', 1);
}else{
	ini_set('display_errors', 0);
}
