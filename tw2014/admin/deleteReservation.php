<html>
<body>
<?php
include '../core/init.php';


if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysql_query("DELETE reservations, reservationsDetails
					FROM reservations
					LEFT JOIN reservationsDetails
    				ON reservations.id = reservationsDetails.reservationId
					WHERE reservations.id = '$id' ");

if(isset($_GET['email']))
{
	$email=$_GET['email'];

	 $subject = "Decline reservation"; 
	 $message = 'We like to inform you that your reservation has been declined.Thank you!'; 
	 $headers = 'From: nelotw2014@egmail.com';
		if(mail($email, $subject, $message, $headers)) {
		 echo 'Email sent successfully!'; } 
		 else { die('Failure: Email was not sent!'); }
}

if($query1)
{
header('location:cereri.php');
}
}
?>
</body>
</html>