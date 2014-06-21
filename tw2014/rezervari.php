<?php 

include 'core/init.php';
?>

<!DOCTYPE html>

<html>
<head>
	<title>Pensiunea Oltea</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<meta content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/base/jquery.ui.all.css">
	<link rel="stylesheet" href="css/base/demos.css">
	<script src="js/lib/jquery-1.10.2.js"></script>
	<script src="js/lib/ui/jquery.ui.core.js"></script>
	<script src="js/lib/ui/jquery.ui.widget.js"></script>
	<script src="js/lib/ui/jquery.ui.datepicker.js"></script>
	<script src="js/rezervari.js"></script>
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
				$query = sprintf("SELECT name FROM utilizatori");
				$result = mysql_query($query);
				while ($row = mysql_fetch_assoc($result)) {
				    echo $row['name'];	   
			}
            	
			?>
			   <form id="contact-form" action="contact.php" method="post">
						<h2>Va rugam sa completati campurile de mai jos pentru a rezerva un loc in pensiunea noastra.</h2>
						
						<label for="from">From</label>
						<input type="text" id="from" name="from"/>
						<label for="to">to</label>
						<input type="text" id="to" name="to"/>

						<div>
							<button name="rezerva" type="submit" id="rezerva">Rezerva Camera</button>
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
</html>