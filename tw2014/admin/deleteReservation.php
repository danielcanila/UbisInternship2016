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

	//DELETE FROM reservations WHERE id = '$id'");
if($query1)
{
header('location:cereri.php');
}
}
?>
</body>
</html>