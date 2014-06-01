<?php 

include 'core/init.php';
?>

<!DOCTYPE html>

<html>
<head>
	<title>Pensiunea Oltea</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
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
					<header>
						<h1>Rezervari</h1>
					</header>
					
					<content>
			<?php 
				$query = sprintf("SELECT name FROM utilizatori");
				$result = mysql_query($query);
				while ($row = mysql_fetch_assoc($result)) {
				    echo $row['name'];	   
			}
            	
			?>
			 <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
                <ul>
                <li>
                    &nbsp; Nume/Prenume*:<br>
                    &nbsp; <input type="text" name="username">
                </li>
                <li>
                    &nbsp; E-mail*:<br>
                    &nbsp; <input type="text" name="email"> <br><br>
                </li>
                <li>
                    &nbsp; Numar de Telefon*:<br>
                    &nbsp; <input type="text" name="phonenumber"> <br><br>
                </li>
                <li>
                &nbsp; <input type="submit" value="Rezerva">
             
                </li>
                </ul>
              </form>
					</content>
				
				</article>
		</div>
	</div>
	<footer class="mainFooter">
		<p>Copyright &copy; 2014  <a href="#">Pisarciuc Ionut-Daniel</a></p>
	</footer>
</body>
</html>