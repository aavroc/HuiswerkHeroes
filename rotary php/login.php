<?php
// require 'config.php';
require 'studentclass.php';

$new_login = new User();
//checked if you pressed on login
if (isset($_POST['login'])) {


	// Get data from FORM
	$username = $_POST['username'];
	$password = $_POST['password'];

	$new_login->loginstudent($username, $password);

	$errMsg = '';
	// check if fields are set
	if (empty($username) || empty($password)) {
		$errMsg = 'Alle velden moeten ingevuld worden.';
	}
}

?>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css\style.css">
</head>

<body>
	<div class="bgImg">
		<div class="opacityLayer">
			<?php
			if (isset($errMsg)) {
				echo '<p class="messageError">' . $errMsg . '</p>';
			}
			?>
			<div class="formContainer">
				<div class="formHeader">
					<p class="formHeaderText">LOGIN</p>
				</div>
				<form action="" method="post">
					<input class="formInput" type="text" name="username" placeholder="Gebruikersnaam" value="<?php if (isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box" /><br /><br />
					<input class="formInput" type="password" name="password" placeholder="Wachtwoord" value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box" /><br /><br />
					<input class="formSubmit" type="submit" name='login' value="Login" class='submit' /><br />
					<a href="#" id="forgottenPass">Wachtwoord vergeten? klik dan hier.</a>
					<div class="formFooter">
						<p class="formFooterText">Nog geen account?</p>
						<a id="signUp" href="register.php">Klik dan hier.</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>