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
						<p>Tabelul care contine cererile neconfirmate la momentul actual.</p>
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