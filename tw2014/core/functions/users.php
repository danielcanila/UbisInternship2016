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



function getRooms($startDate,$endDate,$type){
	return $result = mysql_query("SELECT reservationsdetails.id, reservationsdetails.startDate, reservationsdetails.endDate, rooms.type, rooms.price,rooms.id FROM reservationsdetails INNER JOIN rooms ON reservationsdetails.roomId=rooms.id WHERE reservationsdetails.startDate> '$startDate' AND reservationsdetails.endDate<'$endDate' AND rooms.type='$type'");
}

function getFreeRooms($startDate,$endDate,$type){

	 $result = mysql_query("SELECT rooms.id,rooms.type,rooms.price
		FROM rooms 
		WHERE rooms.type='$type' 
		AND 
		rooms.id NOT IN 
			(SELECT rooms.id 
			 FROM reservationsdetails 
			 INNER JOIN rooms 
			 ON reservationsdetails.roomId=rooms.id 
			 WHERE (reservationsdetails.startDate<='$startDate' AND reservationsdetails.endDate>='$startDate') 
			 OR (reservationsdetails.startDate<='$endDate' AND reservationsdetails.endDate>='$endDate') 
			 AND rooms.type='$type' )");

	
	 return $result;
}

function addUser($register_data){

	$fields	= '`' .implode('`,`', array_keys($register_data)) .'`';
	$data = '\''.implode('\',\'',$register_data) . '\'';
	mysql_query("INSERT INTO `clients` ($fields) VALUES ($data)");
	return mysql_insert_id();
	}

function addReservation($register_data){
	
	$fields	= '`' .implode('`,`', array_keys($register_data)) .'`';
	$data = '\''.implode('\',\'',$register_data) . '\'';

	mysql_query("INSERT INTO `reservations` ($fields) VALUES ($data)");
	return mysql_insert_id();
}

function insertReservationDetails($register_data){

	$fields	= '`' .implode('`,`', array_keys($register_data)) .'`';
	$data = '\''.implode('\',\'',$register_data) . '\'';

	 mysql_query("INSERT INTO `reservationsdetails` ($fields) VALUES ($data)");
	 return mysql_insert_id();
}
?>