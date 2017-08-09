<?php
session_start();
include_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<title>Statystyki</title>

<style>
.errordiv {
    background-color: red;
}
</style>
</head>

<body>
Najwiecej przejechali
<?php
try
			{

				$pdo = connect();
				
				$stmt = $pdo->prepare("SELECT tiry.rejestracja, SUM(trasy.distance) AS Lacznie FROM trasy,tiry WHERE tiry.idTiry=trasy.Tiry_idTiry ORDER BY Lacznie");
				$stmt->execute();
				
			echo "<table border = 1>
				<tr>
				<th>id</th>
				<th>distance</th>
				</tr>";

				while ($r = $stmt->fetch())
				{
					$id = $r['tiry.rejestracja'];
					$sum = $r['Lacznie'];
						echo "<tr>
				<td>$id</td>
				<td>$sum</td>
				</tr>";
				}
				echo "</table>";
			}
			catch(PDOException $e)
			{
			}
			echo '<a href="admin.php">Powrot</a><br>';
			echo '<a href="index.php">Strona domowa</a><br>';
?>