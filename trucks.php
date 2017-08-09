<?php
session_start();
include_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<title>Tiry</title>

<style>
.errordiv {
    background-color: red;
}
</style>
</head>

<body>
<?php
try
			{

				$pdo = connect();
				
				$stmt = $pdo->prepare("SELECT rejestracja, rocznik, spalanie FROM tiry");
				$stmt->execute();
				
			echo "<table border = 1>
				<tr>
				<th>Nr rejestracyjny</th>
				<th>Rok produkcji</th>
				<th>Spalanie na 100km</th>
				</tr>";

				while ($r = $stmt->fetch())
				{
					$rejestracja = $r['rejestracja'];
					$rocznik = $r['rocznik'];
					$spalanie = $r['spalanie'];
						echo "<tr>
				<td>$rejestracja</td>
				<td>$rocznik</td>
				<td>$spalanie</td>
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
<form action="add_truck_h.php" method="post">
Numer rejestracyjny:<br>
<input type="text" name="rejestracja"><br>
Rok produkcji:<br>
<input type="text" name="rocznik"><br>
Spalanie:<br>
<input type="text" name="spalanie"><br>
<input type="submit" value="Dodaj">
</form>
<br>
<br>
<br>
Usun<br>
<form action="del_truck_h.php" method="post">
Numer rejestracyjny:<br>
<input type="text" name="rejestracja"><br>
<input type="submit" value="Usun">
</form>

<?php
if (isset($_SESSION['msg']))
{
	echo '<div class="errordiv">'.$_SESSION['msg'].'</div>';
	unset($_SESSION['msg']);
}
echo '<a href="admin.php">Powrot</a><br>';
echo '<a href="index.php">Strona domowa</a><br>';
?>