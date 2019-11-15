<?php
	require 'studentclass.php';
?>
	<?php
	
$user = new User();
	if(isset($_POST['login'])) {
		// Get data from FORM
		$username_ingevuld = $_POST['username'];
		$wachtwoord_ingevuld = $_POST['password'];
		$user->login($username_ingevuld, $wachtwoord_ingevuld);
	}
?>

<html>
<head><title>Login</title></head>
	<body>
	<form method="post">
              username: <input type="text" name="username" onfocus="this.value=''" value="username"><br>
              password: <input type="password" name="password" onfocus="this.value=''" value="password"><br>
            <input type="submit" name="login" class="btn btn-success mt-2" value="login">
        </form>
	<!-- <style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div align="center">
		<div style=" border: solid 1px #006D9C; " align="left">
			
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Login</b></div>
			<div style="margin: 15px">
				<form action="" method="post">
					<input type="text" name="username" value="username" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="password" value="password" autocomplete="off" class="box" /><br/><br />
					<input type="submit" name='login' value="Login" class='submit'/><br />
				</form>
			</div>
		</div>
	</div> -->
</body>
</html>
<?php var_dump($user); echo $user->getMessage();?>