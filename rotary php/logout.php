<<<<<<< HEAD
<?php
	require 'config.php';
	session_destroy();

	header('Location:../index.php');
?>
=======
<?php
	require 'config.php';
	session_destroy();
	header('Location: index.php');
	exit(); //je wordt uitgelogt en naar index.php gestuurd
?>
>>>>>>> a1095a1aba78462f3a6ae8fad76cacfb5300e5d9
