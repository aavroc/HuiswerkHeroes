<<<<<<< HEAD
<<<<<<< HEAD
<?php
require 'config.php';
if (empty($_SESSION['fullname']))
	header('Location: login.php');
?>

<?php

if (isset($_POST['aanvragen'])) {
	$errorMsg = '';

	$voornaam = $_POST['voornaam'];
	$achternaam = $_POST['achternaam'];
	$vak = $_POST['vak'];

	if ($voornaam == '')
		$errorMsg = 'Enter your fullname';

	if ($achternaam == '')
		$errorMsg = 'Enter username';

	if ($vak == '')
		$errorMsg = 'Enter je vak';

	if ($errorMsg == '') {
		$aanvraagStmt = $connect->prepare('INSERT INTO aanvraagleerling(voornaam, achternaam, vak) VALUES (:voornaam, :achternaam, :vak)');
		$aanvraagStmt->execute(array(
			':voornaam' => $voornaam,
			':achternaam' => $achternaam,
			':vak' => $vak
		));
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="static/css/dashboardStyle.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<title>Document</title>
</head>
<div>
	<div class="dashboard-container">
		<div align="right" class="navbar-dashboard">
			<b class="niveau-style">jou niveau: <?php echo $_SESSION['niveau']; ?></b>
			<b> Welkom <?php echo $_SESSION['fullname']; ?></b>
			<a href="logout.php">Logout</a>
			<a href="update.php">Edit profile</a> <br>
		</div>

		<div class="log-in-text">
			<h1 class="title-header">Welkom bij Huiswerk Heroes!</h1>
			<div class="flex-container">
				<div class="card" onclick="modalBijlesBtn()">
					<div class="container">
						<h4><b>Vraag hier naar bijles!</b></h4>
						<p>druk hier op om een aanvraag te doen voor bijles!</p>
					</div>
				</div>

				<div class="card">
					<div class="container">
						<h4><b>Vraag hier naar bijles!</b></h4>
						<p>druk hier op om een aanvraag te doen voor bijles!</p>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div id="card-modal-bijles" class="modal">

		<div class="modal-content animated bounceInUp">
			<span class="close" onclick="closeModal()">&times;</span>

			<h1>Vraag hier aan wat voor bijles u wilt </h1>

			<form action="" method="post">
				<input type="text" name="voornaam" placeholder="u voornaam"><br>
				<input type="text" name="achternaam" placeholder="u achternaam"><br>
				<select name="vak" class="option-vak">
					<option value="">selecteer jou vak!</option>
					<option value="nederlands">Nederlands</option>
					<option value="duits">Duits</option>
					<option value="engels">Engels</option>
				</select><br>

				<input type="submit" name="aanvragen"> <br>
			</form>
		</div>
	</div>
</div>
<?php
												if (isset($errorMsg)) {
													echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' . $errorMsg . '</div>';
												}
?>
</body>

<body>
	<style>
		body {
			background-color: #18608C;
			font-family: 'Open Sans', sans-serif;
			margin: 0;
		}

		<<<<<<< HEAD .log-in-text {
			font-size: 25px;

			=======.log-in-text {
				margin font-size: 25px;
				>>>>>>>a1095a1aba78462f3a6ae8fad76cacfb5300e5d9
			}

			.navbar-dashboard {
				top: 0;
				border: 0;
				font-size: 22px;
				background-color: #26A6A6;
				color: white;
				padding: 0;
				margin: 0;
				overflow: hidden;
				padding: 30px;
				padding-right: 20px;

			}

			.navbar-dashboard a {
				font-size: 20px;
				top: 0;
				padding: 8px;
				text-decoration: none;
				background-color: white;
				border-radius: 5px;
			}

			.card {
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
				transition: 0.3s;
				width: 30%;
				margin: 25px;
				cursor: pointer;
				background-color: whitesmoke;
			}

			.card:hover {
				box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
			}

			.container {
				padding: 100px 16px;
			}

			.niveau-style {
				left: 0;
				position: absolute;
				margin-left: 2%;
				background-color: whitesmoke;
				color: black;
				padding: 10px;
				border-radius: 5px;
				top: 20px;
			}

			.title-header {
				text-align: center;
				color: white;
				border-bottom: 1px solid white;
				width: 50%;
				margin-left: auto;
				margin-right: auto;
				padding: 25px;
			}

			.flex-container {
				display: flex;
				justify-content: center;
			}

			.modal {
				display: none;
				position: fixed;
				z-index: 1;
				padding-top: 100px;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				overflow: auto;
				background-color: rgb(0, 0, 0);
				background-color: rgba(0, 0, 0, 0.4);
			}


			/* Modal Content */
			.modal-content {
				border-radius: 5px;
				text-align: center;
				background-color: #fefefe;
				margin: auto;
				padding: 20px;
				border: 1px solid #888;
				width: 50%;
			}

			/* The Close Button */
			.close {
				color: #aaaaaa;
				float: right;
				font-size: 28px;
				font-weight: bold;
			}

			.close:hover,
			.close:focus {
				color: #000;
				text-decoration: none;
				cursor: pointer;
			}

			input[type=text],
			select {
				text-align: center;
				width: 50%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}


			select {
				text-align: center;
				margin-left: auto;
				margin-right: auto;
			}

			input[type="submit"] {
				background-color: #26A6A6;
				width: 30%;

				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			}
	</style>
	<script>
		let modalBijles = document.getElementById('card-modal-bijles');

		let span = document.getElementById("close")[0];

		function modalBijlesBtn() {
			modalBijles.style.display = "block";
		}

		function closeModal() {
			modalBijles.style.display = "none";
		}
	</script>
</body>

=======
=======
>>>>>>> f916736240229d922ea969ebb99f15858b156f2c
<?php
	require 'config.php';


	if(empty($_SESSION['username']))
		header('Location: login.php');

	

?>

<?php

if(isset($_POST['aanvragen']))
{
	 $errorMsg = '';
	 
	 $voornaam = $_POST['voornaam'];
	 $achternaam = $_POST['achternaam'];
	 $vak = $_POST['vak'];
	 
	 if($voornaam == '')
	 $errorMsg = 'Enter your fullname';
	 
 	if($achternaam == '')
	 $errorMsg = 'Enter username';

	if($vak == '')
	 $errorMsg = 'Enter je vak';

  if ($errorMsg == '' ) 
  {
		$aanvraagStmt = $connect->prepare('INSERT INTO aanvraagleerling(voornaam, achternaam, vak) VALUES (:voornaam, :achternaam, :vak)');
		$aanvraagStmt->execute(array(
		':voornaam' => $voornaam,
		':achternaam' => $achternaam,
		':vak' => $vak
     ));																		
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="static/css/dashboardStyle.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<title>Document</title>
</head>
<div>
		<div class="dashboard-container">
			<div align="right" class="navbar-dashboard">
			<b class="niveau-style">jou niveau:  <?php echo $_SESSION['niveau']; ?></b> 
				<b> Welkom <?php echo $_SESSION['fullname']; ?></b>
				<a href="logout.php">Logout</a>
				<a href="update.php">Edit profile</a> <br>
			</div>

			<div class="log-in-text">
			<h1 class="title-header">Welkom bij Huiswerk Heroes!</h1>
			<div class="flex-container">
			<div class="card" onclick="modalBijlesBtn()" >
					<div class="container">
						<h4><b>Vraag hier naar bijles!</b></h4>
						<p>druk hier op om een aanvraag te doen voor bijles!</p>
					</div>
				</div>

				<div class="card">
					<div class="container">
						<h4><b>Vraag hier naar bijles!</b></h4>
						<p>druk hier op om een aanvraag te doen voor bijles!</p>
					</div>
				</div>

			</div>
		</div>
	</div>
<div id="card-modal-bijles" class="modal">

<div class="modal-content animated bounceInUp">
		<span class="close" onclick="closeModal()">&times;</span>

		<h1>Vraag hier aan wat voor bijles u wilt </h1>

<form action="" method="post">
	<input type="text" name="voornaam" placeholder="u voornaam"><br>
	<input type="text" name="achternaam" placeholder="u achternaam"><br>
		<select name="vak" class="option-vak">
		<option value="">selecteer jou vak!</option>
		<option value="nederlands">Nederlands</option>
		<option value="duits">Duits</option>
		<option value="engels">Engels</option>
	</select><br>

	<input type="submit" name="aanvragen"> <br>
</form>
</div
>
</div>
	</div>
		<?php
			if(isset($errorMsg))
			{
				echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errorMsg.'</div>';
			}
		?>
</body>
<body>
<style>
body 
{
    background-color: #18608C;
    font-family: 'Open Sans', sans-serif;
    margin: 0;  
}


.log-in-text {
    font-size: 25px;
}

.navbar-dashboard 
{    
    top: 0;
    border: 0;
    font-size: 22px;
    background-color: #26A6A6;
    color: white;
    padding: 0;
    margin: 0;
    overflow: hidden;
    padding: 30px;
    padding-right: 20px;

}

.navbar-dashboard a 
{    
    font-size: 20px;
    top: 0;
    padding: 8px;
    text-decoration: none;
    background-color: white;
    border-radius: 5px;
}

.card 
{	
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
	width: 30%;
	margin:25px;
	cursor: pointer;	
	background-color: whitesmoke;
}

.card:hover 
{
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
  
.container 
{
    padding: 100px 16px;
}

.niveau-style
{
	left: 0;
	position: absolute;
	margin-left: 2%;
	background-color: whitesmoke;
	color: black;
	padding: 10px;
	border-radius: 5px;
	top: 20px;
}

.title-header
{
	text-align: center;
	color: white;
	border-bottom: 1px solid white;
	width: 50%;
	margin-left: auto;
	margin-right: auto;
	padding: 25px;
}

.flex-container
{
	display: flex;
	justify-content: center;
}

.modal
{
	display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}


/* Modal Content */
.modal-content 
{
    border-radius: 5px;
    text-align: center;
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
}

/* The Close Button */
.close 
{
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover, .close:focus 
{
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

input[type=text], select 
{
text-align: center;
width: 50%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}


select
{
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}
input[type="submit"]
{
	background-color:  #26A6A6;
	width: 30%;
 
  	color: white;
  	padding: 14px 20px;
  	margin: 8px 0;
  	border: none;
  	border-radius: 4px;
  	cursor: pointer; 
}

</style>
<script>
let modalBijles = document.getElementById('card-modal-bijles');

let span = document.getElementById("close")[0];

function modalBijlesBtn()
{
	modalBijles.style.display = "block";
}

function closeModal()
{
	modalBijles.style.display = "none";
}
</script>
</body>

<<<<<<< HEAD
>>>>>>> f916736240229d922ea969ebb99f15858b156f2c
=======
>>>>>>> f916736240229d922ea969ebb99f15858b156f2c
</html>