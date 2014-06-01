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
			<li><a href="rezervari.php">Rezervari</a></li>
			<li class="checked"><a href="contact.php">Contact</a></li>
		</ul></nav>
	</header>
		
	<div class="mainContent" >
		<div class="content">	
				<article class="articleContent">	
					<header>
						<h1>Contact Pensiunea Oltea</h1>
					</header>
					
					<content>
						<p>Pensiunea Oltea este situata in orasul Campulung Moldovenesc, Str. Alexandru Vlahuta nr 20. Pentru mai multe detalii in legatura cu locatia pensiunii va rog sa vizualizati 	
						<a href="localizare.html">Harta-Localizare</a> </p>
						<p>Pentru mai multe informatii referitor la rezervari va rog sa folositi pagina dedicata acestei sectiuni:<a href="rezervari.html">Rezervari</a>. Daca doriti mai multe detalii in timp real va rugam sa ne contactati la numarul de telefon: <a href="#">0723109090</a> persoana de contact <a href="#">Hodor</a>.</p>
					
					

					 <?php
         
			          $to = 'ionutdny9@yahoo.com';
			          $subject = 'Sent by:';
			          $contact_submitted = 'Mesajul dumneavoastra a fost trimis, va multumim.';

			        
			          function email_is_valid($email) {
			            return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
			          }
			          if (!email_is_valid($to)) {
			            echo '';
			          }
			          if (isset($_POST['contact_submitted'])) {
			            $return = "\r";
			            $youremail = trim(htmlspecialchars($_POST['your_email']));
			            $yourname = stripslashes(strip_tags($_POST['your_name']));
			            $yourmessage = stripslashes(strip_tags($_POST['your_message']));
			            $contact_name = "Name: ".$yourname;
			            $message_text = "Message: ".$yourmessage;
			            $user_answer = trim(htmlspecialchars($_POST['user_answer']));
			            $answer = trim(htmlspecialchars($_POST['answer']));
			            $message = $contact_name . $return . $message_text;
			            $headers = "From: ".$youremail;
			            if (email_is_valid($youremail) && !eregi("\r",$youremail) && !eregi("\n",$youremail) && $yourname != "" && $yourmessage != "" && substr(md5($user_answer),5,10) === $answer) {
			              mail($to,$subject,$message,$headers);
			              $yourname = '';
			              $youremail = '';
			              $yourmessage = '';
			              echo '<h2><a href="#">'.$contact_submitted.'</a></h2>';
			            }
			            else echo '';
			          }
			          $number_1 = rand(1, 9);
			          $number_2 = rand(1, 9);
			          $answer = substr(md5($number_1+$number_2),5,10);
       				?>
      
			        <form id="contact-form" action="contact.php" method="post">
						<h2>Daca aveti intrebari sau sugestii nu ezitati sa folositi formularul de mai jos pentru a ne contacta.</h2>
						<div>
							<label>
								<span>Name*: </span>
								<input placeholder="Nume" type="text" tabindex="1" name="your_name" required autofocus>
							</label>
						</div>
						<div>
							<label>
								<span>Email*: </span>
								<input placeholder="Adresa de E-mail" type="email" tabindex="2" name="your_email"  required>
							</label>
						</div>
						<div>
							<label>
								<span>Message*: </span>
								<textarea placeholder="Mesajul dumneavoastra" tabindex="15" name="your_message" required></textarea>
							</label>
						</div>
						<div>
							<label>
								<span>Intrebare de securitate*: <?php echo $number_1; ?> + <?php echo $number_2; ?> = ?</span>				
								<input type="text" tabindex="1" required name="user_answer">
								<input type="hidden" name="answer" value="<?php echo $answer; ?>" />
							</label>
						</div>
						<div>
							<button name="contact_submitted" type="submit" id="contact-submit">Trimite E-mail</button>
						</div>
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