<?php
	require 'config.php';

	if(isset($_POST['register'])) {
		$errMsg = '';
		



		// Get data from register form
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$niveau = $_POST['niveau'];
		


		// check if every field is not empty
		if(empty($fullname) || empty($username) || empty($password) || empty($niveau))
		{
			//redirect to the same page, but put filled in values in URL. 
			header("location:register.php?error=emptyfield&fullname=" .$fullname. "&username=" . $username);
			$errMsg = "Alle velden moeten ingevuld worden";
			exit();
		}
		//check for invalid username
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
		{
			header("location:register.php?error=invalidPasswordd&fullname=" .$fullname);
			$errMsg = "gebruikersnaam voldoet niet aan criteria.";
			exit();
		}

		else
		{
			$username_stmt = $connect->prepare("SELECT * FROM user WHERE username=?");
			$username_stmt->execute(array($username));
			$result = $username_stmt->fetchAll();
			if (!empty($result) ) {
			$errMsg='Username is already taken please choose another one';
			}
		
		
			
	

		if($errMsg == ''){
			try {
				//hashing password
				$hashedPass = password_hash($password, PASSWORD_DEFAULT);
				//SQL INSERT
				$stmt = $connect->prepare('INSERT INTO user (fullname, username, password, niveau) VALUES (:fullname, :username, :password, :niveau)');
				$stmt->execute(array(
					':fullname' => $fullname,
					':username' => $username,
					':password' => $hashedPass,
					':niveau' => $niveau
					));


			


			
		

				header('Location: register.php?action=joined');


				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="login.php">login</a>';
	}
?>

<html>
<head><title>Register</title></head>
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
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Register</b></div>
			<div style="margin: 15px">
				<form action="" method="post">
					<input type="text" name="fullname" placeholder="Fullname" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br/><br />
					<select name="niveau">
						<option value="">selecteer niveau</option>
						  <option value="1">niveau-1</option>
						  <option value="2">niveau-2</option>
						  <option value="3">niveau-3</option>
						  <option value="4">niveau-4</option>

  						
					</select>
					
					
					<input type="submit" name='register' value="Register" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
