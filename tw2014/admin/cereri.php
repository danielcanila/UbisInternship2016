<?php 
include '../core/init.php';
protect_page();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pensiunea Oltea</title>

	<link rel="stylesheet" href="../css/style.css" type="text/css" />
	<meta content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
	<script>
		
		function deleteReservation(q){
			var answer = confirm("Are you sure you want to delete this reservation?")
			if (answer){
				window.location = q;
				alert("Reservation deleted.")
			}
			else{
				
			}
		}
		
		function confirmClient(d){
				window.location = d;
		}
		function editClient(e){
			alert("EditClient");
		}
		function showRow(clientId,elem){
			var clientId =  $("#clientDetails" + clientId).toggle();	
			if(elem.value == "Show"){
				elem.value =  "Hide";
			}
			else {
			elem.value = "Show";
			}
		}
		  
	
	</script>


</head>

<body class="body">
	<header class="firstHeader">
		<img src="../img/logo.gif">
		<nav><ul>
			<li class="checked"><a href="cereri.php">Cereri</a></li>
			<li><a href="confirm.php">Confirmat</a></li>
			<li><a href="istoric.php">Istoric</a></li>
			<li><a href="../index.html">WebSite</a></li>
		</ul></nav>
	</header>
		
	<div class="mainContent" >
		<div class="content">	
				<article class="articleContent">	
				
					<content>
					<div class="logoutAdmin">
					<input type="button" value="LogOut" onclick="location.href = 'logout.php';">
					</div>

					
			     <?php 
       				

					$result = mysql_query("SELECT clients.id, clients.email,clients.name, clients.surname, clients.phone,reservationsdetails.reservationId, reservationsdetails.startDate, reservationsdetails.endDate, reservations.totalCost, reservationsdetails.breakfast, reservationsdetails.dinner, reservationsdetails.lunch, reservationsdetails.spa, rooms.type FROM reservationsdetails INNER JOIN rooms ON reservationsdetails.roomId=rooms.type INNER JOIN clients ON reservationsdetails.clientId=clients.id INNER JOIN reservations ON reservationsdetails.reservationId = reservations.Id WHERE reservations.status = '0' AND DATE(reservationsdetails.startDate) > DATE(NOW()) GROUP BY clients.id ") or die (mysql_error());
						
						echo "<table class='table'>";
								echo " <thead>
					               <tr><td colspan=6></td></tr>
					                <tr>
					                 <th>Nume</th>
					                 <th>Telefon</th>
					                 <th>Data</th>
					                 <th>Pret</th>
					                 <th>Setari</th>
					                </tr>";
					            echo "</thead>";
					          while( $query2 = mysql_fetch_array($result)) 
							{        
							$reservationId = $query2['reservationId'];

							$clientId = $query2['id'];
							$clientEmail = $query2['email'];
					            echo "<tbody>";
					                echo "<tr>";
										echo "<td>".$query2['name']."</td>";
				             		  	echo "<td>".$query2['phone']."</td>";
				             		  	echo "<td>".$query2['startDate']."<br>".$query2['endDate']."</td>";
									 	echo "<td>".$query2['totalCost']."</td>";
					   					echo "<td><input type='button' value='Show' onclick=\"showRow(".$clientId.",this)\" ></td>";
									echo "</tr>";
								
					             	echo "<tr>";
					         			echo "<td rowspan='5' colspan='5'>";
					         			echo "<ul id='clientDetails".$clientId."' style='display:none'>";
					           		  	echo "<li>Nume/Prenume: ".$query2['name']."".$query2['surname']."</li><br>";
					           		  	echo "<li>Numar telefon:".$query2['phone']." </li><br>";
					           		  	 
					           		  	echo "<li>Tip Camera:".$query2['type']." </li><br>";
					           		  	echo "<li>".$query2['startDate']."<-->".$query2['endDate']."</li>";
					           		  	echo "<br><li>Faciliati:".$query2['breakfast'].",".$query2['lunch'].",".$query2['dinner'].",".$query2['spa']."</li><br>";
										
									
										
										echo "<form><input type='button' onclick=\"confirmClient('confirmClient.php?email=".$clientEmail."&id=".$reservationId."')\" value='Confirm'/></form>";
										echo "<form><input type='button' onclick=\"editClient('editClient.php?id=".$reservationId."')\" value='Edit'/></form>";
										echo "<form><input type='button' onclick=\"deleteReservation('deleteReservation.php?email=".$clientEmail."&id=".$reservationId."')\" value='Decline'/></form>";	
										
					         							         			
					         			echo "</ul>";
					         			echo "</td>";
					         			
					         		echo "</tr>";
					         		echo "</tbody>"; 
					         	}	
					      echo "</table>";  
					   
						
						?>
					<?php
         			  $client = mysql_query("SELECT clients.id, clients.name, clients.surname, clients.phone, reservationsdetails.startDate, reservationsdetails.endDate, reservations.totalCost, reservationsdetails.breakfast, reservationsdetails.dinner, reservationsdetails.lunch, reservationsdetails.spa, rooms.type FROM reservationsdetails INNER JOIN rooms ON reservationsdetails.roomId=rooms.type INNER JOIN clients ON reservationsdetails.clientId=clients.id INNER JOIN reservations ON reservationsdetails.reservationId = reservations.Id GROUP BY clients.id ") or die (mysql_error());
					  $clientInfo = mysql_fetch_array($client);
			          $to = 'ionutdny9@yahoo.com';
			          $subject = 'Sent by:';
			          $contact_submitted = 'Confirmat';
			          function email_is_valid($email) {
			            return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
			          }
			          if (!email_is_valid($to)) {
			            echo '';
			          }
			       
			         
			         if (isset($_GET['contact_submitted'])) {
			             
			            $youremail = "ionutdny@gmail.com";
			            $yourname = "Andrei";
			            $yourmessage = "Mesaj trimis";
			            $contact_name = "Name: ".$yourname;
			            $message_text = "Message: ".$yourmessage;
			            $user_answer = "raspuns";
			           
			             $message = "Hello,".$clientInfo['name']." ".$clientInfo['surname'].", we like to inform you that we just confirm your registration to our hotel.
			           	
			            </br>
			            If you want to pay via paypal you can use the link given bellow, or you can pay at our reception.
			            Total price per reservation is: ".$clientInfo['totalCost']." "."Have a nice day!

			            ";
			           
			            $headers = "From: ".$youremail;
			           if (email_is_valid($youremail) && !eregi("\r",$youremail) && !eregi("\n",$youremail) && $yourname != "" && $yourmessage != "") {
			              mail($to,$subject,$message,$headers);
			              $yourname = '';
			              $youremail = '';
			              $yourmessage = '';
			              echo '<h1><a href="#">'.$contact_submitted.'</a></h1>';
			            }
			            else echo '';
			          }
       				?>
		
		
					</content>
				
				</article>

		</div>
	</div>
	<footer class="mainFooter">
		<p>Copyright &copy; 2014  <a class="orangeMarked" href="../tw2014/documentatie/">Pisarciuc Ionut-Daniel & Canila Ovidiu-Daniel</a></p>
	</footer>
</body>
</html>