<?php
require 'config.php';

//checked if you pressed on login
if (isset($_POST['login'])) {
	$errMsg = '';

<<<<<<< HEAD
	//Alles wat in de post gestopt wordt (wat je in de forms invult) wordt in de var gestopt
	$username = $_POST['username'];
	$password = $_POST['password'];


	// check if fields are set
	if (empty($username) || empty($password)) {
		$errMsg = 'Alle velden moeten ingevuld worden.';
	} else {
		try {
			// SQL query for login. Also grabs data that will later be used into sessions.
			$sql = "SELECT * FROM user WHERE username = :gebruikersnaam";
			$statement = $connect->prepare($sql);
			$statement->bindParam(":gebruikersnaam", $username);
			$statement->execute();

			$database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);
			if ($database_gegevens == FALSE) {
				header("location: login.php?error=dbconnFailed");
				exit();
			} else {
				// password and hashed password check if it's the same.
				$passcheck = password_verify($password, $database_gegevens['password']);
				if ($passcheck == FALSE) {
					header("location: login.php?error=invalidLogin");
					exit();
				} else if ($passcheck == TRUE && $username = $database_gegevens['username']) {
					$_SESSION['name'] = $database_gegevens['fullname'];
					$_SESSION['username'] = $database_gegevens['username'];
					$_SESSION['niveau'] = $database_gegevens['niveau'];
					$_SESSION['id'] = $database_gegevens['id'];

					header("location: dashboard.php?login=succes");
					exit();
				} else {
					// header("location: login.php?error=wrongPass");
					exit();
				}
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
=======
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
		
>>>>>>> f916736240229d922ea969ebb99f15858b156f2c
	}
}
?>

<html>
<<<<<<< HEAD

<head>
	<title>Login</title>
</head>
<style>
	html,
	body {
=======
<head><title>Login</title></head>
	<body>
	<form method="post">
              email: <input type="email" name="email" onfocus="this.value=''" value="email"><br>
              password: <input type="password" name="password" onfocus="this.value=''" value="password"><br>
            <input type="submit" name="login" class="btn btn-success mt-2" value="login">
        </form>
	<!-- <style>
	html, body {
>>>>>>> f916736240229d922ea969ebb99f15858b156f2c
		margin: 1px;
		border: 0;
	}
</style>

<body>
	<div align="center">
		<div style=" border: solid 1px #006D9C; " align="left">
<<<<<<< HEAD
			<?php
			if (isset($errMsg)) {
				echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errMsg . '</div>';
			}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Login</b></div>
			<div style="margin: 15px">
				<form action="" method="post">
					<input type="text" name="username" placeholder="Gebruikersnaam" value="<?php if (isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box" /><br /><br />
					<input type="password" name="password" placeholder="Wachtwoord" value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box" /><br /><br />
					<input type="submit" name='login' value="Login" class='submit' /><br />
=======
			
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Login</b></div>
			<div style="margin: 15px">
				<form action="" method="post">
<<<<<<< HEAD
					<input type="text" name="username" value="username" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="password" value="password" autocomplete="off" class="box" /><br/><br />
=======
					<input type="text" name="username" placeholder="Gebruikersnaam" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="password" placeholder="Wachtwoord" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box" /><br/><br />
>>>>>>> b9365b4c47215e5326dfcf96a76da8c19dd5fc88
					<input type="submit" name='login' value="Login" class='submit'/><br />
>>>>>>> f916736240229d922ea969ebb99f15858b156f2c
				</form>
			</div>
		</div>
	</div> -->
</body>
<<<<<<< HEAD

</html>
=======
</html>
<?php echo $user->getMessage();?>
>>>>>>> f916736240229d922ea969ebb99f15858b156f2c
