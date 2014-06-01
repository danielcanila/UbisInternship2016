<?php
include '../core/init.php';
logged_in_redirect();

if (empty($_POST)==false){

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password) == true){
		$errors[] = 'Introduceti nume si parola';
	}else if(user_active($username) ==false){
		$errors[] = 'Accountul de admin nu este activat!';
	}else {
		$login = login($username, $password);
		if ($login == false){
			$errors[] = 'Numele sau parola sunt gresite';
		}else {
			$_SESSION['user_id'] = $login;
			header('Location: cereri.php');
			exit();
		}
	}
}
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
	</header>
		
	<div class="mainContent" >
		<div class="content">	
				<article class="articleContent">	
									
					<content>
					<h1>Admin-Login</h1>
					
					<?php 
						echo output_errors($errors);
					?>	
					<?php
          			    if(logged_in() == true){
          			    header ('Location: cereri.php');  
           				}else{
            			include 'login/login.php';   }
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