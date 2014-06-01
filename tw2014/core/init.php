<?php
session_start();
//error_reporting(0);
//connect to the database and to all the functions that we use in the application 
require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';

if(logged_in()==true){
	$session_user_id = $_SESSION['user_id'];
	$user_data= user_data($session_user_id, 'user_id','username', 'password');
	if(user_active($user_data['username']) == false){
		session_destroy();
		header('Location: logout.php');
		exit();
	}
}
$errors = array();
?>