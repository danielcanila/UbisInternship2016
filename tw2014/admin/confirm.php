<?php 
include '../core/init.php';
protect_page();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pensiunea Oltea</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta  name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
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
			<li ><a href="cereri.php">Cereri</a></li>
			<li class="checked"> <a href="confirm.php">Confirmat</a></li>
			<li><a href="istoric.php">Istoric</a></li>
			<li><a href="../index.html">WebSite</a></li>
		</ul></nav>
	</header>
		
	<div class="mainContent" >
		<div class="content">	
				<article class="articleContent">	
				
					
					<div class="logoutAdmin">
					<input type="button" value="LogOut" onclick="location.href = 'logout.php';">
					</div>

					
			     <?php 
       				

					$result = mysql_query("SELECT clients.id, clients.name, clients.surname, 
						clients.phone, reservationsdetails.startDate, reservationsdetails.endDate, 
						reservationsdetails.reservationId, reservations.totalCost, reservationsdetails.breakfast, reservationsdetails.dinner, reservationsdetails.lunch, reservationsdetails.spa, rooms.type,reservations.status FROM reservationsdetails INNER JOIN rooms ON reservationsdetails.roomId=rooms.type INNER JOIN clients ON reservationsdetails.clientId=clients.id INNER JOIN reservations ON reservationsdetails.reservationId = reservations.id WHERE reservations.status = '1' GROUP BY clients.id ") or die (mysql_error());
						
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
										
									
										echo "<form><input type='button' onclick=\"deleteReservation('deleteReservation.php?id=".$reservationId."')\" value='Delete'/></form>";	
									
					         							         			
					         			echo "</ul>";
					         			echo "</td>";
					         			
					         		echo "</tr>";
					         		echo "</tbody>"; 
					         	}	
					      echo "</table>";  
					   
							
						?>
					
		
				</article>

		</div>
	</div>
	<footer class="mainFooter">
		<p>Copyright &copy; 2014  <a class="orangeMarked" href="../tw2014/documentatie/">Pisarciuc Ionut-Daniel & Canila Ovidiu-Daniel</a></p>
	</footer>
</body>
</html>