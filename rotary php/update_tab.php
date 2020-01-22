<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<h1>test</h1>
<form method="post" action="">

    <label>Titel</label>
    <input type="text" name="titel"><br>
    
    <label>uitgever</label>
    <input type="text" name="uitgever"><br>
    
    <label>voorraad</label>
    <input type="number" name="voorraad"><br>

    <label>prijs</label>
    <input type="text" name="prijs"><br>

    <input type="submit" name="verzenden">
    </form>
</body>
</html>

<?php

//connection with the database

$servername = "localhost";
$username = "root";
$password = "";

    $conn = new PDO("mysql:host=$servername;dbname=webshop", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 

    if (isset($_POST['verzenden'])) {

        $titel = $_POST['titel'];
        $uitgever = $_POST['uitgever'];
        $Voorraad = $_POST['voorraad'];
        $prijs = $_POST['prijs'];

        $updateValue = $conn->prepare("UPDATE producten SET titel  = :titel, uitgever = :uitgever, voorraad = :voorraad, prijs = :prijs WHERE game_id = :game_id");

        // $updateValue = $conn->prepare("INSERT INTO producten(titel, uitgever, voorraad) VALUES (:titel, :uitgever, :voorraad)");

        $updateValue->bindParam("titel", $titel);
        $updateValue->bindParam("uitgever", $uitgever);
        $updateValue->bindParam("voorraad", $Voorraad);
        $updateValue->bindParam("prijs", $prijs);
        $updateValue->bindParam('game_id', $_GET['game_id']);

        if ($updateValue->execute()) 
        {
            echo "data is aangepast";
        }

        else
        {
            echo "data is niet aangepast";
        }
    }

    $Voorraad = "SELECT * FROM producten";
    $resultVoorraad = $conn->query($Voorraad);

    foreach ($resultVoorraad as $row) {
        echo $row['titel'] . "<br>";
    }

?>