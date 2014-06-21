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
	<link rel="stylesheet" href="css/base/style-calendar.css">
	<script src="js/lib/jquery-1.10.2.js"></script>
	<script src="js/lib/ui/jquery.ui.core.js"></script>
	<script src="js/lib/ui/jquery.ui.widget.js"></script>
	<script src="js/lib/ui/jquery.ui.datepicker.js"></script>
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
		
			<content>
			   <form id="contact-form" action="contact.php" method="post">
					
						<div class="check-in">
							<label for="from">
								<span>Check-in</span>
								<input type="text" tabindex="1" name="from" id="from" required autofocus >
							</label>
						</div>					
						<div class="check-out">
							<label for="to">
								<span>Check-out</span>
								<input type="text" tabindex="1" id="to" name="to" required autofocus>
							</label>
						</div>	
						<div class="nrCamere">
						<div> Numar de camere</div>
						<select id="numberOfRooms" name="numberOfRooms">
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						  <option value="7">7</option>
						  <option value="8">8</option>
						  <option value="9">9</option>
						  <option value="10">10</option>
						  <option value="11">11</option>
						  <option value="12">12</option>
						</select>
						<div id="selectareTipCamere"></div>
					</div>
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
	<script src="js/rezervari.js"></script>
</html>