<?php
session_start();
include_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<title>Trasy</title>

<style>
.errordiv {
    background-color: red;
}
</style>
</head>

<body>
<?php
echo "Trasy dla ".$_POST['rejestracja'];

try
			{	$rejestracja = $_POST['rejestracja'];
				$pdo = connect();
				
				$stmt = $pdo->prepare("SELECT idTiry FROM tiry WHERE rejestracja=:r");
				$stmt->bindParam(':r',$rejestracja, PDO::PARAM_STR, 7);
				$stmt->execute();
				$r = $stmt->fetch();
				$idTiry = $r['idTiry'];
				
				$_SESSION['idTiry'] = $idTiry;
				
				$stmt = $pdo->prepare("SELECT idTrasy, dystans FROM trasy WHERE Tiry_idTiry=:idTiry");
				$stmt->bindParam(':idTiry',$idTiry, PDO::PARAM_INT);
				$stmt->execute();
				
			echo "<table border = 1>
				<tr>
				<th>Nr trasy</th>
				<th>Dystans</th>
				</tr>";

				while ($r = $stmt->fetch())
				{
					$id = $r['idTrasy'];
					$dystans = $r['dystans'];
						echo "<tr>
				<td>$id</td>
				<td>$dystans</td>
				</tr>";
				}
				echo "</table>";
			}
			catch(PDOException $e)
			{
			}
			
			
				
?>
<br>
Dodaj<br>
<form action="add_route_h.php" method="post">
Dystans:<br>
<input type="text" name="dystans"><br>
<input type="submit" value="Dodaj">
</form>

<?php
	echo '<a href="routes.php">Powrot</a><br>';
	echo '<a href="index.php">Strona domowa</a><br>';