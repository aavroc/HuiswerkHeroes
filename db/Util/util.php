<?php 
$user = "root";
$pass = "";
$host = "localhost";
$dbname = "rotary_huiswerkheroes";
$sql_file = fopen('RHWH_28-01-20.sql', 'r');
$sql = fread($sql_file, filesize('RHWH_28-01-20.sql'));
$conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname , $user, $pass);
$conn->exec($sql);
?>