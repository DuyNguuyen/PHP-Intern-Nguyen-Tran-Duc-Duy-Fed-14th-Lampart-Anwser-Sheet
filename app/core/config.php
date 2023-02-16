<?php 
define("WEBSITE_TITLE", 'LOGIN SYSTEM');
define('THEME','Login-System/');
define('DEBUG', true);

define('DB_NAME', "users_db");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_TYPE', "mysql");
define('DB_HOST', "localhost");

if(DEBUG){
	ini_set('display_errors', 1);
}else{
	ini_set('display_errors', 0);
}
