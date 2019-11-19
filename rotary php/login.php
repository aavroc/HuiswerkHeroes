<?php
	require 'config.php';

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
				$sql = 'SELECT * FROM pdo  WHERE username = :gebruikersnaam AND password = :wachtwoord';
				$statement = $connect->prepare($sql);
				$statement->bindParam(":gebruikersnaam", $username);
				$statement->bindParam(":wachtwoord", $password);
				$statement->execute();
				$database_gegevens = $statement->fetchAll(PDO::FETCH_ASSOC); 
				if($database_gegevens == FALSE)
				{
					header("location: login.php?error=dbconnFailed");
					exit();
				
				}
				else
				{
					$passcheck = password_verify($password, $row['password']);
					if($passcheck == FALSE)
					{
						header("location: login.php?error=wrongPass");
						exit();
					}
					else if($passcheck == TRUE && $username == $row['username'])
					{
						session_start();
						$_SESSION['name'] = $row['fullname'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['niveau'] = $row['niveau'];
						$_SESSION['id'] = $row['id'];

						header("dashboard.php?login=succes");
						exit();
					}
					else
					{
						header("location: login.php?error=wrongPass");
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
