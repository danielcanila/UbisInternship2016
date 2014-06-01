
<form id="contact-form" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">

<div>
	<label>
		<span>Nume: </span>
		<input placeholder="Nume admin" type="text" tabindex="1" name="username"  required autofocus>
	</label>
</div>
<div>
	<label>
		<span>Parola: </span>
		<input placeholder="Parola admin" type="password" tabindex="1" name="password"  required autofocus>
	</label>
</div>
<div>
	<button name="login" type="submit" id="login">Login</button>
</div>
</form>
					