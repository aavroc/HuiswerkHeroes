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
<head><title>Login</title></head>
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div align="center">
		<div style=" border: solid 1px #006D9C; " align="left">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Login</b></div>
			<div style="margin: 15px">
				<form action="" method="post">
					<input type="text" name="username" placeholder="Gebruikersnaam" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="password" placeholder="Wachtwoord" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box" /><br/><br />
					<input type="submit" name='login' value="Login" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
