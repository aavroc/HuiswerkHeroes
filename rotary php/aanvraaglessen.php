<?php
    require 'config.php';
		// $query = $connect->prepare("DELETE FROM aanvraagleerling WHERE id = :id");
		// $query->bindParam("id", $_GET['id']);
		$sqlDel = "DELETE FROM aanvraagleerling WHERE id =  :id";
		$stmts = $connect->prepare($sqlDel);
		$stmts->bindParam(':id', $_GET['id'], PDO::PARAM_INT);   
		$stmts->execute();

		$sql = "SELECT * FROM aanvraagleerling";
		$statement = $connect->prepare($sql);
		$statement->execute();
        $result = $statement->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
	<thead>
		<tr class="names-table">
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>Vak</th>
		</tr>
	</thead>
<tbody>
	<?php
		foreach ($result as $value) 
		{ 
			?>
			<tr>
				<td><?php echo $value["voornaam"] ?></td>
				<td><?php echo $value["achternaam"] ?></td>
				<td><?php echo $value["vak"] ?></td>

				<?php echo " <td><a class='button-aanvraag' href='aanvraaglessen.php?leerling_id=". $value['id'] ."'>test </td>";?>
				</tr>
			<?php }
			$connect = null;
		?>
</tbody>
</table>
    
<style>
.names-table
{
	font-size: 25px;
}

.button-aanvraag
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
td 
{
	padding: 1.8em;
	border-collapse: collapse;
}
thead 
{
	border: 1px solid black;
}
table 
{
    margin-left: auto;
    margin-right: auto;
		
	width: 70%;
	text-align: center;
}

table tr:nth-child(even)
{
	background-color: whitesmoke;
}
</style>

</body>
</html>