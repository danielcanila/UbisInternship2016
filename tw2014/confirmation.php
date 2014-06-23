<?php 

include 'core/init.php';

   

$paypal_url='https://www.paypal.com/cgi-bin/webscr';
$paypal_id='ionutdny9-facilitator@gmail.com'; // Business email ID
					
?>

<!DOCTYPE html>

<html>
<head>
	<title>Pensiunea Oltea</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta  name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<script src="js/lib/jquery-1.10.2.js"></script>
</head>

<body class="body">
	<header class="firstHeader">
		<img src="img/logo.gif">
		<nav><ul>
			<li><a href="index.html">Acasa</a></li>
			<li><a href="localizare.html">Localizare</a></li>
			<li><a href="cazare.html">Cazare</a></li>
			<li class="checked"><a href="rezervari.php">Rezervari</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul></nav>
	</header>
		
	<div class="mainContent" >
		<div class="content">	
				<article class="articleContent">	
				
						<?php 
						// if (isset($_SESSION['visited'])) {
						//     header("Location: rezervari.php");
						// } else {
						//     $_SESSION['visited'] = true;
						// }
						$totalCost = trim(htmlspecialchars($_POST['totalReservationCost']));
						$startDate = trim(htmlspecialchars($_POST['startDate']));
						$endDate  = trim(htmlspecialchars($_POST['endDate']));
						$selectedRooms = trim(htmlspecialchars($_POST['selectedRooms']));
						$name =  trim(htmlspecialchars($_POST['name']));
						$surname =  trim(htmlspecialchars($_POST['surname']));
						$phone =  trim(htmlspecialchars($_POST['phoneNumber']));
						$email = trim(htmlspecialchars($_POST['email']));

						$selectedRoomsArray = explode(" ",$selectedRooms);
						
						// add user
						$user_data = array(
	                           'name' => $name,
	                           'surname' => $surname,
	                           'phone' => $phone,
	                           'email' => $email
	                          );

						$userId = addUser($user_data);

						//add reseervation

						 $reservation_data = array(
			                        'totalCost' => $totalCost,
			                        'status' => '0'
	                           );
						$reservationId = addReservation($reservation_data);
						
						//add reservationDetails

						$selectedRooms = html_entity_decode($selectedRooms);
						$rooms = json_decode($selectedRooms);

						foreach($rooms as $key =>$value){ 
							 $reservationDetails_data = array(
						                           'clientId' => $userId,
						                           'roomId' => $rooms[$key]->id,
						                           'startDate' => date("Y-m-d", strtotime($startDate)),
						                           'endDate' => date("Y-m-d", strtotime($endDate)),
						                           'breakfast' => $rooms[$key]->b,
						                           'lunch' => $rooms[$key]->l,
						                           'dinner' => $rooms[$key]->d,
						                           'spa' => $rooms[$key]->s,
						                           'reservationId' => $reservationId
						                          );
							 insertReservationDetails($reservationDetails_data);
						 }
						?>
	     		 	
				 
						<h2>Inregistrare facuta cu success</h2>
						
						<?php 
							echo '<div>Rezervarea cu id-ul '.$reservationId.' a fost inregistrata.</div>';
							echo '<div>In scurt timp veti primi un mai de confirmare de la unul din operatorii nostri</div>'

						?>	
			

				</article>
		</div>
	</div>
	<footer class="mainFooter">
		<p>Copyright &copy; 2014  <a class="orangeMarked" href="../tw2014/documentatie/">Pisarciuc Ionut-Daniel & Canila Ovidiu-Daniel</a></p>
	</footer>
</body>
	<script src="js/clientInfo.js"></script>
</html>