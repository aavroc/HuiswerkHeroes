<?php
	require 'config.php';

//checked if you pressed on login
	if(isset($_POST['login'])) 
	{
		$errMsg = '';

		// Get data from FORM
		$username = $_POST['username'];
		$password = $_POST['password'];


		// check if fields are set
		if(empty($username) || empty($password))
		{
			$errMsg = 'Alle velden moeten ingevuld worden.';
		} 
		else
		{
			try
			{
				// SQL query for login. Also grabs data that will later be used into sessions.
				$sql = "SELECT * FROM user WHERE username = :gebruikersnaam";
				$statement = $connect->prepare($sql);
				$statement->bindParam(":gebruikersnaam", $username);
				$statement->execute();
				
				$database_gegevens = $statement->fetch(PDO::FETCH_ASSOC); 
				if($database_gegevens == FALSE)
				{
					header("location: login.php?error=dbconnFailed");
					exit();
				
				}
				else
				{
					// password and hashed password check if it's the same.
					$passcheck = password_verify($password, $database_gegevens['password']);
					if($passcheck == FALSE)
					{
						header("location: login.php?error=invalidLogin");
						exit();
					}
					else if($passcheck == TRUE && $username = $database_gegevens['username'])
					{
						$_SESSION['fullname'] = $database_gegevens['fullname'];
						$_SESSION['username'] = $database_gegevens['username'];
						$_SESSION['niveau'] = $database_gegevens['niveau'];
						$_SESSION['id'] = $database_gegevens['id'];

						header("location: dashboard.php?login=succes");
						exit();
					}
					else
					{
						
						header("location: login.php?error=invalidData");
						exit();
					}
					
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		
	}
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="/rotary\HuiswerkHeroes\css\style.css">
</head>
<body>
	<div class="bgImg">
		<div class="opacityLayer">
			<?php
				if(isset($errMsg)){
					echo '<p class="messageError">'.$errMsg.'</p>';
				}
			?>
			<div class="formContainer">
				<div class="formHeader"><p class="formHeaderText">LOGIN</p></div>
					<form action="" method="post">
						<input class="formInput" type="text" name="username" placeholder="Gebruikersnaam" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
						<input class="formInput" type="password" name="password" placeholder="Wachtwoord" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box" /><br/><br />
						<input class="formSubmit" type="submit" name='login' value="Login" class='submit'/><br />
						<a href="#" id="forgottenPass">Wachtwoord vergeten? klik dan hier.</a>
						<div class="formFooter">
							<p class="formFooterText">Nog geen account?</p>
							<a id="signUp"href="register.php">Klik dan hier.</a>
						</div>
					</form>
			</div>
		</div>
	</div>
</body>
</html>
