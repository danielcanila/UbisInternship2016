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
					<header>
						<h1>Clientii care sunt in curs de procesare</h1>
					</header>
					<content  >
						<?php

					$result = mysql_query("SELECT rezervation.id, rezervation.startDate, rezervation.endDate, rooms.type, rooms.price, clients.name , clients.phone FROM rezervation , rooms , clients") or die (mysql_error());
						
						echo "<table id='table'>";
							echo " <thead>
					               <tr><td colspan=7></td></tr>
					                <tr>
					                 <th>ID</th><th>Nume</th><th>Telefon</th><th>Data</th><th>Camere</th><th>Pret</th><th>Setari</th>
					                </tr>
					               </thead>";
						 while( $query2 = mysql_fetch_array($result)) 
							{        
							$qw = $query2['id'];
							echo "
						             <tbody>
					                 <tr>
					         	    	 <td>".$query2['id']."</td>";
					         	    	echo "<td>".$query2['name']."</td>";
				             		  	echo "<td>".$query2['phone']."</td>";
				             		  	echo "<td>".$query2['startDate']."<br>".$query2['endDate']."</td>";
									 	
										echo "<td>".$query2['type']."</td>";
									 	echo "<td>".$query2['price']."</td>";
									
					 
					   				echo "<td><form><input type='button' onclick=\"information('information.php?id=".$qw."')\" value='Extra'></form>&nbsp;&nbsp;&nbsp;";
									echo "<form><input type='button' onclick=\"confirmRezervation('confirmRezervation.php?id=".$qw."')\" value='Accept'></form></td>";
					                echo "</tr>
					         		</tbody>"; 
					         }
							echo "</table>"; 
						?>
						<a href="logout.php">Log out</a>
					</content>
				
				</article>
		</div>
	</div>
	<footer class="mainFooter">
		<p>Copyright &copy; 2014  <a class="orangeMarked" href="#">Pisarciuc Ionut-Daniel & Canila Ovidiu-Daniel</a></p>
	</footer>
</body>
</html>