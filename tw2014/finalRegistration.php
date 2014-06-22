<?php 

include 'core/init.php';

   

$paypal_url='https://www.paypal.com/cgi-bin/webscr';
$paypal_id='ionutdny9-facilitator@gmail.com'; // Business email ID
					
?>

<!DOCTYPE html>

<html>
<head>
	<title>Pensiunea Oltea</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<script src="js/lib/jquery-1.10.2.js"></script>
	<meta content="width=device-width, initial-scale=1.0">
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
					<header>
						<h1>Rezervari Pensiunea Oltea</h1>
					</header>
					
					<content>
						<?php 
						$totalCost = trim(htmlspecialchars($_POST['totalReservationCost']));
						$startDate = trim(htmlspecialchars($_POST['startDate']));
						$endDate  = trim(htmlspecialchars($_POST['endDate']));
						$selectedRooms = trim(htmlspecialchars($_POST['selectedRooms']));
						
						$selectedRoomsArray = explode(" ",$selectedRooms);
						
						// for($i = 0; $i <  sizeof($selectedRooms); $i++) {
						// 		if(isset($_POST['breakfastOfRoom'.$selectedRooms[$i]])) {
						// 					$breakFastCheckbox = $_POST['breakfastOfRoom'.$selectedRooms[$i]];
						// 					echo $breakFastCheckbox;
						// 				}
						// 		if(isset($_POST['lunchOfRoom'.$selectedRooms[$i]])) {
						// 					$breakFastCheckbox = $_POST['lunchOfRoom'.$selectedRooms[$i]];
						// 					echo $breakFastCheckbox;
						// 				}
						// 		if(isset($_POST['dinnerOfRoom'.$selectedRooms[$i]])) {
						// 					$breakFastCheckbox = $_POST['dinnerOfRoom'.$selectedRooms[$i]];
						// 					echo $breakFastCheckbox;
						// 				}
						// 		if(isset($_POST['spaOfRoom'.$selectedRooms[$i]])) {
						// 					$breakFastCheckbox = $_POST['spaOfRoom'.$selectedRooms[$i]];
						// 					echo $breakFastCheckbox;
						// 				}

						// 	}
					
						?>
	     		 	
				    <form id="contact-form" action="clientRegistration.php" method="post">
						<h2>SUMAR</h2>
						
						<?php 
							echo '<input type="text" id="totalReservationCost" name="totalReservationCost" value="'.$totalCost.'" hidden/>';
							echo '<input type="text" name="startDate" value="'.$startDate.'" hidden/>';
							echo '<input type="text" name="endDate" value="'.$endDate.'" hidden/>';
							echo '<input type="text" id="selectedRooms" name="selectedRooms" value="'.$selectedRooms.'" hidden/>';
						?>	
						<div>
							<button name="finalRegistrationSubmit" type="submit" id="finalRegistrationSubmit">Submit final registration</button>
						</div>
					</form>
						
		
					</content>

				</article>
		</div>
	</div>
	<footer class="mainFooter">
		<p>Copyright &copy; 2014  <a class="orangeMarked" href="#">Pisarciuc Ionut-Daniel & Canila Ovidiu-Daniel</a></p>
	</footer>
</body>
	<script src="js/clientInfo.js"></script>
</html>