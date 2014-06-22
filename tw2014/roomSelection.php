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
					
					
					<content>
					<form id="roomSelection" action="clientInfo.php" method="post">
								<?php 
									$numberOfSingleRooms = 0;
									$numberOfDoubleRooms = 0;
									$numberOfTripleRooms = 0;
									$singleRooms;
									$doubleRooms;
									$tripleRooms;
									$from;
									$to;
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
											
											$count = 0;
											$singleRooms  = getFreeRooms($from,$to,'1');

											if(mysql_num_rows($singleRooms)==0){
												echo 'Nu sunt camere single libere in perioada de '.$perioada;
											}
											else
											{ 	
												echo '<table id="singleRoomsTable" class="table">';
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
												    				<span>Breakfast<br>
													    			<input type='checkbox' name='breakfastOfRoom$row[0]' class='RoomBreakfastCheckbox singleRoomCheckbox$rowNumber' value='yes' onclick='updateSum($ini_array[breakfast],$rowNumber,1,this,$row[0],$numberOfDays)'>
													    			
													    			Lunch
													       			<input type='checkbox' name='lunchOfRoom$row[0]' class='RoomLunchCheckbox singleRoomCheckbox$rowNumber' value='yes'	  onclick='updateSum($ini_array[lunch],$rowNumber,1,this,$row[0],$numberOfDays)'>
													    			</span>
													    			
													    			<span>Dinner<br>
													    			<input type='checkbox' name='dinnerOfRoom$row[0]' class='RoomDinnerCheckbox singleRoomCheckbox$rowNumber' value='yes'    onclick='updateSum($ini_array[dinner],$rowNumber,1,this,$row[0],$numberOfDays)'>
													    			
													    			
													    			Spa
													    			<input type='checkbox' name='spaOfRoom$row[0]' class='RoomSpaCheckbox singleRoomCheckbox$rowNumber' value='yes'       onclick='updateSum($ini_array[spa],$rowNumber,1,this,$row[0],$numberOfDays)'>
												    				</span>

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
												echo '<table id="doubleRoomsTable" class="table">';
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
													    			<span>Breakfast<br>
													    			<input type='checkbox' name='breakfastOfRoom$row[0]' class='RoomBreakfastCheckbox singleRoomCheckbox$rowNumber' value='yes' onclick='updateSum($ini_array[breakfast],$rowNumber,2,this,$row[0],$numberOfDays)'>
													    			
													    			Lunch
													       			<input type='checkbox' name='lunchOfRoom$row[0]' class='RoomLunchCheckbox singleRoomCheckbox$rowNumber' value='yes'	  onclick='updateSum($ini_array[lunch],$rowNumber,2,this,$row[0],$numberOfDays)'>
													    			</span>
													    			
													    			<span>Dinner<br>
													    			<input type='checkbox' name='dinnerOfRoom$row[0]' class='RoomDinnerCheckbox singleRoomCheckbox$rowNumber' value='yes'    onclick='updateSum($ini_array[dinner],$rowNumber,2,this,$row[0],$numberOfDays)'>
													    				
													    			
													    			Spa
													    			<input type='checkbox' name='spaOfRoom$row[0]' class='RoomSpaCheckbox singleRoomCheckbox$rowNumber' value='yes'       onclick='updateSum($ini_array[spa],$rowNumber,2,this,$row[0],$numberOfDays)'>
												    				</span>	
																</th>
											    				<th id='doubleRoomPrice$rowNumber'>$row[2]</th>
											    			  </tr>";
											    		$rowNumber++;
													}
												echo '</tbody>
													</table>';
											}
										}
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
												echo '<table id="tripleRoomsTable" class="table">';
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
											    		
																echo   "
																		<th><input type='checkbox' class='tripleRoomCheckbox' id='room$row[0]' onclick='updateSelectedRooms($rowNumber,3,this,$row[0],$numberOfDays)'></th>
																		<th>$row[1]</th>
													    				<th>$row[0]</th>
													    				<th>$perioada</th>
													    				<th>
																	    	<span>Breakfast<br>
															    			<input type='checkbox' name='breakfastOfRoom$row[0]' name='breakfastOfRoom$row[0]' class='RoomBreakfastCheckbox singleRoomCheckbox$rowNumber' value='yes' onclick='updateSum($ini_array[breakfast],$rowNumber,3,this,$row[0],$numberOfDays)'>
														
															    			Lunch
															       			<input type='checkbox' name='lunchOfRoom$row[0]' class='RoomLunchCheckbox singleRoomCheckbox$rowNumber' value='yes'	  onclick='updateSum($ini_array[lunch],$rowNumber,3,this,$row[0],$numberOfDays)'>
															    			</span>
															    			
															    			<span>Dinner<br>
															    			<input type='checkbox' name='dinnerOfRoom$row[0]' class='RoomDinnerCheckbox singleRoomCheckbox$rowNumber' value='yes'    onclick='updateSum($ini_array[dinner],$rowNumber,3,this,$row[0],$numberOfDays)'>
															    		
															    			Spa
															    			<input type='checkbox' name='spaOfRoom$row[0]' class='RoomSpaCheckbox singleRoomCheckbox$rowNumber' value='yes'       onclick='updateSum($ini_array[spa],$rowNumber,3,this,$row[0],$numberOfDays)'>
														    				</span>

														    			</th>
													    				<th id='tripleRoomPrice$rowNumber'>$row[2]</th>
															 </tr>";
																    		$rowNumber++;
																		}

																	echo '</tbody>
																		</table>';

																}
															}
															echo '<p> Breakfast : '.$ini_array["breakfast"].
																	' RON | Lunch : '.$ini_array["lunch"].
																	' RON | Dinner : '.$ini_array["dinner"].
																	' RON | Spa : '.$ini_array["spa"].' RON</p>';
															

															echo '<input type="text" name="startDate" value="'.$from.'" hidden/>';
															echo '<input type="text" name="endDate" value="'.$to.'" hidden/>';
															echo '<input type="text" id="selectedRooms" name="selectedRooms" value="" hidden/>';
															echo "<p>Toatal cost:";
															echo '<input type="text" id="totalReservationCost" name="totalReservationCost" value="0" readonly/></p>';

											     			 }
														?>
						
						<div>
							<button name="roomsSubmit" onclick="createSelectedRoomsString()" type="submit" id="roomsSubmit">Submit rooms</button>
						</div>
						</form>
					</content>
				</article>
		</div>
	</div>
	<footer class="mainFooter">
		<p>Copyright &copy; 2014  <a class="orangeMarked" href="../tw2014/documentatie/">Pisarciuc Ionut-Daniel & Canila Ovidiu-Daniel</a></p>
	</footer>
</body>
	<script src="js/roomSelection.js"></script>
</html>