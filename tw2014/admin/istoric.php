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
			<li class="checked"><a href="istoric.php">Istoric</a></li>
			<li ><a class="website" href="../index.html">WebSite</a></li>
		</ul></nav>
	</header>
		
	<div class="mainContent" >
		<div class="content">	
				<article class="articleContent">	
					<header>
						<h1>Istoricul cererilor de cazare pana in momentul actual</h1>
					</header>
					
					<content  >
						<p>Tabelul care contine toate cererile de cazare ale clientilor.</p>
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