<?php
	require 'config.php';
	session_destroy();
	header('Location: index.php');
	exit(); //je wordt uitgelogt en naar index.php gestuurd
?>
