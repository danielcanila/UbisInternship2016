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
	<script type="text/javascript">

		function information(url) {
		newwindow=window.open(url,'name','height=200,width=150');
		if (window.focus) {newwindow.focus()}
		return false;
	}
	</script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
	<script>

		function showRow(clientId){
			var clientId =  $("#clientDetails" + clientId).toggle();					
		}
		  
	
	</script>


</head>

<body class="body">
	<header class="firstHeader">
		<img src="../img/logo.gif">
		<nav><ul>
			<li class="checked"><a href="cereri.php">Cereri</a></li>
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

					$result = mysql_query("SELECT clients.id, clients.name, clients.surname, clients.phone, rezervation.startDate, rezervation.endDate, rezervation.totalCost, rezervation.breakfast, rezervation.dinner, rezervation.lunch, rezervation.spa, rooms.type FROM rezervation INNER JOIN rooms ON rezervation.roomId=rooms.type INNER JOIN clients ON rezervation.clientId=clients.id GROUP BY clients.id ") or die (mysql_error());
						
						echo "<table class='table'>";
								echo " <thead>
					               <tr><td colspan=6></td></tr>
					                <tr>
					                 <th>Nume</th><th>Telefon</th><th>Data</th><th>Pret</th><th>Setari</th>
					                </tr>";
					            echo "</thead>";
					          while( $query2 = mysql_fetch_array($result)) 
							{        
							$clientId = $query2['id'];
					            echo "<tbody>";
					                echo "<tr>";
										echo "<td>".$query2['name']."</td>";
				             		  	echo "<td>".$query2['phone']."</td>";
				             		  	echo "<td>".$query2['startDate']."<br>".$query2['endDate']."</td>";
									 	echo "<td>".$query2['totalCost']."</td>";
					   					echo "<td><input type='button' value='Show/Hide' onclick=\"showRow(".$clientId.")\" ></td>";
									echo "</tr>";
								
					             	echo "<tr>";
					         			echo "<td rowspan='5' colspan='5'>";
					         			echo "<ul id='clientDetails".$clientId."' style='display:none'>";
					           		  	echo "<li>Nume/Prenume: ".$query2['name']."".$query2['surname']."</li><br>";
					           		  	echo "<li>Numar telefon:".$query2['phone']." </li><br>";
					           		  	 
					           		  	echo "<li>Tip Camera:".$query2['type']." </li><br>";
					           		  	echo "<li>".$query2['startDate']."<-->".$query2['endDate']."</li>";
					           		  	echo "<br><li>Faciliati:".$query2['breakfast'].",".$query2['lunch'].",".$query2['dinner'].",".$query2['spa']."</li><br>";
										
									
										echo "<form><input type='button' onclick=\"confirmReservation('confirmReservation.php?id=".$clientId."')\" value='Accept'></form>";
										echo "<form><input type='button' onclick=\"editClient('editClient.php?id=".$clientId.")\" value='Edit'></form>";
										echo "<form><input type='button' onclick=\"deleteReservation('deleteReservation.php?id=".$clientId."')\" value='Delete'></form>";	
										
					         							         			
					         			echo "</ul>";
					         			echo "</td>";
					         			
					         		echo "</tr>";
					         		echo "</tbody>"; 
					         	}	
					      echo "</table>";  
					   
							
						?>
						
			

					</content>
				
				</article>

		</div>
	</div>
	<footer class="mainFooter">
		<p>Copyright &copy; 2014  <a class="orangeMarked" href="#">Pisarciuc Ionut-Daniel & Canila Ovidiu-Daniel</a></p>
	</footer>
</body>
</html>