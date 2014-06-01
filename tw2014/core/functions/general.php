<?php 

//this function verify if the user is logged in and redirect him to the first page (cereri.php)
function logged_in_redirect() {
if(logged_in() == true){

	header('Location: cereri.php');
	exit();
	}
}
//this function protects the pages from users who don't have rights for this account or they 
//are log out and need to log in and as well  protects the pages from unknown users
function protect_page(){

	if(logged_in()== false){

		header('Location: index.php');
		exit();
	}
}
//displays on the screen all the errors
function output_errors($errors){
	return '<h1>' . implode($errors) . '</h1>';
}

//function that sanitizes(prevent SQL Injection) the array
function array_sanitize(&$item){

	$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
}

//function that sanitizes the data before sending it to MySQL
function sanitize($data){

	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}
?>
