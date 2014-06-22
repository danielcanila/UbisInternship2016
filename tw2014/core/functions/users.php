<?php
//verify if the user is logged in
function logged_in(){
	return (isset($_SESSION['user_id'])) ? true:false;
}

//select the user_id by username from the admin tabel
function user_id_from_username($username){
$username = sanitize($username);
return mysql_result(mysql_query("SELECT `user_id` FROM `admin` WHERE `username` = '$username'"), 0 , 'user_id');
}
//check if the user is logged in
function login($username,$password){
	$user_id = user_id_from_username($username);
	$username = sanitize($username);
	$password = sanitize($password);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`)FROM `admin` WHERE `username`='$username' AND `password` = '$password' "), 0) == 1) ? $user_id : false;
}

//verify if the user is active 
function user_active($username){
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`)FROM `admin` WHERE `username`='$username' AND `active` = 1 "), 0) ==1) ? true : false;
}
//select all the fields from each user by user_id
function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args =  func_get_args();

	if($func_num_args > 0 ){
		unset($func_get_args[0]);
		
		$fileds ='`'. implode('` , `',$func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fileds FROM `admin` WHERE `user_id` = $user_id "));

		return $data;	
	}
}

function insertReservation($register_data){

	$fields	= '`' .implode('`,`', array_keys($register_data)) .'`';
	$data = '\''.implode('\',\'',$register_data) . '\'';

	 echo $data;
	 echo mysql_query("INSERT INTO `rezervation` ($fields) VALUES ($data)");
}

function getRooms($startDate,$endDate,$type){
	return $result = mysql_query("SELECT rezervation.id, rezervation.startDate, rezervation.endDate, rooms.type, rooms.price,rooms.id FROM rezervation INNER JOIN rooms ON rezervation.roomId=rooms.id WHERE rezervation.startDate> '$startDate' AND rezervation.endDate<'$endDate' AND rooms.type='$type'");
}
?>