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
	

</head>

<body class="body">
	<header class="firstHeader">
		<img src="../img/logo.gif">
		<nav><ul>
			<li><a href="cereri.php">Cereri</a></li>
			<li><a href="confirm.php">Confirm</a></li>
			<li class="checked"><a href="istoric.php">Istoric</a></li>
			<li ><a class="website" href="../index.html">WebSite</a></li>
		</ul></nav>
	</header>
		
	<div class="mainContent" >
		<div class="content">	
				<article class="articleContent">	
					
					
					<content  >
							<div class="logoutAdmin">
					<input type="button" value="LogOut" onclick="location.href = 'logout.php';">
					</div>	
						<?php

					$result = mysql_query("SELECT clients.id, clients.name, clients.phone, reservationsdetails.startDate, reservationsdetails.endDate, reservations.totalCost 
						FROM reservationsdetails 
						INNER JOIN rooms ON reservationsdetails.roomId=rooms.type 
						INNER JOIN clients ON reservationsdetails.clientId=clients.id 
						INNER JOIN reservations ON reservationsdetails.reservationId = reservations.Id 
						WHERE  DATE(reservationsdetails.endDate) < DATE(NOW()) 
						GROUP BY reservationsdetails.reservationId") or die (mysql_error());
						
						echo "<table class='table'>";
								echo " <thead>
					               <tr><td colspan=6></td></tr>
					                <tr>
					                 <th>ID</th>	
					                 <th>Nume</th>
					                 <th>Telefon</th>
					                 <th>Data</th>
					                 <th>Pret</th>
					                 <th>Setari</th>
					                </tr>";
					            echo "</thead>";
					      
					          while( $query2 = mysql_fetch_array($result)) 
							{        
							$clientId = $query2['id'];
					            echo "<tbody>";
	
					                	echo "<tr>";
					                	echo "<td>".$query2['id']."</td>";
										echo "<td>".$query2['name']."</td>";
				             		  	echo "<td>".$query2['phone']."</td>";
				             		  	echo "<td>".$query2['startDate']."<br>".$query2['endDate']."</td>";
									 	echo "<td>".$query2['totalCost']."</td>";
					   					echo "<td><input type='button' value='ExportDoc' onclick=\"exportDocument(".$clientId.")\" ></td>";
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