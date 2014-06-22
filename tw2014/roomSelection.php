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
					<form id="contact-form" action="clientInfo.php" method="post">
								<?php 
									$numberOfSingleRooms = 0;
									$numberOfDoubleRooms = 0;
									$numberOfTripleRooms = 0;
									$singleRooms;
									$doubleRooms;
									$tripleRooms;
									$ini_array = parse_ini_file("nelo_config.ini");

						     		 if (isset($_POST['rezerva'])) {

						     		 	 $from = date("Y-m-d", strtotime(trim(htmlspecialchars($_POST['from']))));
						     		 	 $to = date("Y-m-d", strtotime(trim(htmlspecialchars($_POST['to']))));
						     		 	 $numberOfRooms = trim(htmlspecialchars($_POST['numberOfRooms']));
										 $numberOfDays = (strtotime($to)- strtotime($from))/24/3600 + 1;
						     		 	 // rooms type
						     		 	 $rooms = array();

						     		 	 for ($i = 0; $i < intval($numberOfRooms); $i++) {
						    			 array_push($rooms, trim(htmlspecialchars($_POST['room'.$i])));
										 }

										 foreach ($rooms as $value) {
						    			 if($value == 'single') {
						    			 	$numberOfSingleRooms++;
						    			 	}
						    			 	else
						    			 		if($value == 'double') {
						    			 			$numberOfDoubleRooms++;
						    			 		}
						    			 			else
						    			 				if($value == 'triple') {
						    			 					$numberOfTripleRooms++;
						    			 				}

										} 	
										

								
										$perioada = date("d/m/Y", strtotime($from))." - ". date("d/m/Y", strtotime($to));
										if($numberOfSingleRooms>0)
										{	
											echo 'Single<br>';
											$count = 0;
											$singleRooms  = getFreeRooms($from,$to,'1');

											if(mysql_num_rows($singleRooms)==0){
												echo 'Nu sunt camere single libere in perioada de '.$perioada;
											}
											else
											{ 	
												echo '<table id="singleRoomsTable" class="roomsTable">';
												echo '<thead>
												<tr> 
													<th> Selectati camera </th>
													<th> Tip Camera </th>
													<th> Numar camera </th>
													<th> Start Date / End Date</th>
													<th> Facilitati </th>
													<th> Pret pe noapte (RON) </th>
												</tr>
												</thead>
													<tbody>';
													$rowNumber = 0;
													while ($row = mysql_fetch_row($singleRooms)) {
														// limitare numar de camere
														//if(($count++) == $numberOfSingleRooms)
															//break;
											    		echo "<tr>
											    				<th><input type='checkbox' class='singleRoomCheckbox' id='room$row[0]' onclick='updateSelectedRooms($rowNumber,1,this,$row[0],$numberOfDays)'></th>
											    				<th>$row[1]</th>
											    				<th>$row[0]</th>
											    				<th>$perioada</th>
											    				<th>
												    				<input type='checkbox' class='RoomBreakfastCheckbox singleRoomCheckbox$rowNumber' value='breakfast' onclick='updateSum($ini_array[breakfast],$rowNumber,1,this,$row[0],$numberOfDays)'>Breakfast
												    				<input type='checkbox' class='RoomLunchCheckbox singleRoomCheckbox$rowNumber' value='lunch'	  onclick='updateSum($ini_array[lunch],$rowNumber,1,this,$row[0],$numberOfDays)'>Lunch
												    				<input type='checkbox' class='RoomDinnerCheckbox singleRoomCheckbox$rowNumber' value='dinner'    onclick='updateSum($ini_array[dinner],$rowNumber,1,this,$row[0],$numberOfDays)'>Dinner
												    				<input type='checkbox' class='RoomSpaCheckbox singleRoomCheckbox$rowNumber' value='spa'       onclick='updateSum($ini_array[spa],$rowNumber,1,this,$row[0],$numberOfDays)'>Spa
											    				</th>
											    				<th id='singleRoomPrice$rowNumber'>$row[2]</th>
											    			  </tr>";
											    		$rowNumber++;
													}
												echo '</tbody>
													</table>';
											}
										}
										echo '<br>';
											
										if($numberOfDoubleRooms>0)
										{
											echo 'Double<br>';
											$count = 0;
											$doubleRooms  = getFreeRooms($from,$to,'2');
											if(mysql_num_rows($doubleRooms)==0){
												echo 'Nu sunt camere double libere in perioada de '.$perioada;
											}
											else
											{ 	
												echo '<table id="doubleRoomsTable" class="roomsTable">';
												echo '<thead>
												<tr> 
													<th> Selectati camera </th>
													<th> Tip Camera </th>
													<th> Numar camera </th>
													<th> Start Date / End Date</th>
													<th> Facilitati </th>
													<th> Pret pe noapte (RON) </th>
												</tr>
												</thead>
													<tbody>';
													$rowNumber = 0;
													while ($row = mysql_fetch_row($doubleRooms)) {
														// limitare numar de camere
														//if(($count++) == $numberOfDoubleRooms)
															//break;
											    		echo "<tr>
											    				<th><input type='checkbox' class='doubleRoomCheckbox' id='room$row[0]' onclick='updateSelectedRooms($rowNumber,2,this,$row[0],$numberOfDays)'></th>
											    				<th>$row[1]</th>
											    				<th>$row[0]</th>
											    				<th>$perioada</th>
											    				<th>
												    				<input type='checkbox' class='RoomBreakfastCheckbox singleRoomCheckbox$rowNumber' value='breakfast' onclick='updateSum($ini_array[breakfast],$rowNumber,2,this,$row[0],$numberOfDays)'>Breakfast
												    				<input type='checkbox' class='RoomLunchCheckbox singleRoomCheckbox$rowNumber' value='lunch'	  onclick='updateSum($ini_array[lunch],$rowNumber,2,this,$row[0],$numberOfDays)'>Lunch
												    				<input type='checkbox' class='RoomDinnerCheckbox singleRoomCheckbox$rowNumber' value='dinner'    onclick='updateSum($ini_array[dinner],$rowNumber,2,this,$row[0],$numberOfDays)'>Dinner
												    				<input type='checkbox' class='RoomSpaCheckbox singleRoomCheckbox$rowNumber' value='spa'       onclick='updateSum($ini_array[spa],$rowNumber,2,this,$row[0],$numberOfDays)'>Spa
											    				</th>
											    				<th id='doubleRoomPrice$rowNumber'>$row[2]</th>
											    			  </tr>";
											    		$rowNumber++;
													}
												echo '</tbody>
													</table>';
											}
										}
										/*	 3-type 4-price  5-id
										 		1		2		0*/
										echo '<br>';
										if($numberOfTripleRooms>0)
										{
											echo 'Triple<br>';
											$count = 0;
											$tripleRooms  = getFreeRooms($from,$to,'3');
											if(mysql_num_rows($tripleRooms)==0){
												echo 'Nu sunt camere triple libere in perioada de '.$perioada;
											}
											else
											{ 	
												echo '<table id="tripleRoomsTable" class="roomsTable">';
												echo '<thead>
												<tr> 
													<th> Selectati camera </th>
													<th> Tip Camera </th>
													<th> Numar camera </th>
													<th> Start Date / End Date</th>
													<th> Facilitati </th>
													<th> Pret pe noapte (RON) </th>
												</tr>
												</thead>
													<tbody>';
													$rowNumber = 0;
													while ($row = mysql_fetch_row($tripleRooms)) {
														// limitare numar de camere
														//if(($count++) == $numberOfTripleRooms)
															//break;
											    		echo "<tr>
											    				<th><input type='checkbox' class='tripleRoomCheckbox' id='room$row[0]' onclick='updateSelectedRooms($rowNumber,3,this,$row[0],$numberOfDays)'></th>
																    				<th>$row[1]</th>
																    				<th>$row[0]</th>
																    				<th>$perioada</th>
																    				<th>
																	    				<input type='checkbox' class='RoomBreakfastCheckbox singleRoomCheckbox$rowNumber' value='breakfast' onclick='updateSum($ini_array[breakfast],$rowNumber,3,this,$row[0],$numberOfDays)'>Breakfast
																	    				<input type='checkbox' class='RoomLunchCheckbox singleRoomCheckbox$rowNumber' value='lunch'	  onclick='updateSum($ini_array[lunch],$rowNumber,3,this,$row[0],$numberOfDays)'>Lunch
																	    				<input type='checkbox' class='RoomDinnerCheckbox singleRoomCheckbox$rowNumber' value='dinner'    onclick='updateSum($ini_array[dinner],$rowNumber,3,this,$row[0],$numberOfDays)'>Dinner
																	    				<input type='checkbox' class='RoomSpaCheckbox singleRoomCheckbox$rowNumber' value='spa'       onclick='updateSum($ini_array[spa],$rowNumber,3,this,$row[0],$numberOfDays)'>Spa
																    				</th>
																    				<th id='tripleRoomPrice$rowNumber'>$row[2]</th>
																    			  </tr>";
																    		$rowNumber++;
																		}
																	echo '</tbody>
																		</table>';

																}
															}
															echo '<div> Breakfast : '.$ini_array["breakfast"].
																	' RON | Lunch : '.$ini_array["lunch"].
																	' RON | Dinner : '.$ini_array["dinner"].
																	' RON | Spa : '.$ini_array["spa"].' RON</div>';
															
															echo '<div id="testButtonToBeremoved"><button onclick="testareFunctie(50,70,90,5,8,6,10)">CLICK ME TEST</button></div>';	
															//echo '<div id="totalCostDiv">  TOTAL COST : <label id="totalReservationCost" name="totalReservationCost">0</label> RON</div>';
															echo '<input type="text" id="totalReservationCost" name="totalReservationCost" value="0" readonly/>';
															/*
											     		 	 $register_data = array(
											                           'clientId' => '1',
											                           'roomId' => '1',
											                           'startDate' => date("Y-m-d", strtotime($from)),
											                           'endDate' => date("Y-m-d", strtotime($to)),
											                           'totalCost' => '2000',
											                           'breakfast' => '0',
											                           'lunch' => '0',
											                           'dinner' => '0',
											                           'spa' => '0'
											                          );
															*/
											     		 	 //insertReservation($register_data);
											     			 }
														?>
						
						<div>
							<button name="roomsSubmit" type="submit" id="roomsSubmit">Submit rooms</button>
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
	<script src="js/roomSelection.js"></script>
</html>