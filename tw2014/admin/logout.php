<?php
//logout.php, logout the user the account 
session_start();
session_destroy();
header('Location: index.php');
?>