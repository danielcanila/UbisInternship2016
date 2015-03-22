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
					<header>
						<h1>Rezervari Pensiunea Oltea</h1>
					</header>
					
						<?php 
						$totalCost = trim(htmlspecialchars($_POST['totalReservationCost']));
						$startDate = trim(htmlspecialchars($_POST['startDate']));
						$endDate  = trim(htmlspecialchars($_POST['endDate']));
						$selectedRooms = trim(htmlspecialchars($_POST['selectedRooms']));
						//'[{"Id": "1", "b": "1", "l": "0", "d" : "0" , "s" : "1" },{"Id": "1", "b": "1", "l": "0", "d" : "0" , "s" : "1" }]';
						
						$roomJsonObject = '[';
						$selectedRoomsArray= array();
						if(strlen($selectedRooms)>1){
							$selectedRoomsArray = explode(" ",$selectedRooms);
						}
						else{
							$selectedRoomsArray[0] = $selectedRooms;
						}
						for($i = 0; $i <  sizeof($selectedRoomsArray); $i++) {
								
								$jsonObject = ',{';
								if($i== 0)
									$jsonObject = '{';
								
								$jsonObject = $jsonObject.' "id" : "'.$selectedRoomsArray[$i].'" , ';
								if(isset($_POST['breakfastOfRoom'.$selectedRoomsArray[$i]])) {
											$breakFastCheckbox = $_POST['breakfastOfRoom'.$selectedRoomsArray[$i]];
											if($breakFastCheckbox == 'yes')
												$jsonObject = $jsonObject.' "b" : "1" , ';
										}
								else
									$jsonObject = $jsonObject.' "b" : "0" , ';
								if(isset($_POST['lunchOfRoom'.$selectedRoomsArray[$i]])) {
											$lunchCheckbox = $_POST['lunchOfRoom'.$selectedRoomsArray[$i]];
											if($lunchCheckbox == 'yes')
												$jsonObject = $jsonObject.' "l" : "1" , ';
										}
								else
									$jsonObject = $jsonObject.' "l" : "0" , ';
								if(isset($_POST['dinnerOfRoom'.$selectedRoomsArray[$i]])) {
											$dinnerCheckbox = $_POST['dinnerOfRoom'.$selectedRoomsArray[$i]];
											if($dinnerCheckbox == 'yes')
												$jsonObject = $jsonObject.' "d" : "1" , ';
										}
								else
									$jsonObject = $jsonObject.' "d" : "0" , ';
								if(isset($_POST['spaOfRoom'.$selectedRoomsArray[$i]])) {
											$spaCheckbox = $_POST['spaOfRoom'.$selectedRoomsArray[$i]];
											if($spaCheckbox == 'yes')
												$jsonObject = $jsonObject.' "s" : "1" } ';
										}
								else
									$jsonObject = $jsonObject.' "s" : "0" } ';
								
								$roomJsonObject=$roomJsonObject.$jsonObject;
							}
						$roomJsonObject=$roomJsonObject.']';

						?>
	     		 	
				    <form id="contact-form" action="confirmation.php" method="post">
						<h2>Va rugam sa completati campurile de mai jos cu datele personale.</h2>
						<div>
							<label>
								<span>Nume*: </span>
								<input placeholder="Nume" type="text" tabindex="1" name="name" required autofocus>
							</label>
						</div>
						<div>
							<label>
								<span>Prenume*: </span>
								<input placeholder="Prenume" type="text" tabindex="1" name="surname" required autofocus>
							</label>
						</div>
						<div>
							<label>
								<span>Numar de telefon*: </span>
								<input placeholder="Numar de telefon" type="text" tabindex="1" name="phoneNumber" required autofocus>
							</label>
						</div>
						<div>
							<label>
								<span>Email*: </span>
								<input placeholder="Adresa de E-mail" type="email" tabindex="2" name="email"  required>
							</label>
						</div>
						<?php 
							echo '<input type="text" id="totalReservationCost" name="totalReservationCost" value="'.$totalCost.'" hidden/>';
							echo '<input type="text" name="startDate" value="'.$startDate.'" hidden/>';
							echo '<input type="text" name="endDate" value="'.$endDate.'" hidden/>';
							echo "<input type='text' id='selectedRooms' name='selectedRooms' value='".$roomJsonObject."' hidden/>";
						?>	
						<div>
							<button name="personalDataSubmit" type="submit" id="personalDataSubmit">Submit date personale</button>
						</div>
					</form>
				
				</article>
		</div>
	</div>
	<footer class="mainFooter">
		<p>Copyright &copy; 2014  <a class="orangeMarked" href="../tw2014/documentatie/">Pisarciuc Ionut-Daniel & Canila Ovidiu-Daniel</a></p>
	</footer>
</body>
</html>