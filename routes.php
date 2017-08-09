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
try{
	$pdo = connect();
	$stmt = $pdo->prepare("SELECT rejestracja FROM tiry");
	$stmt->execute();
	echo '<form action="route_of_truck.php" method="post">
	<br>Wybierz ciezarowke do wykonania misji:<br>
		<select name="rejestracja">';
	while ($r = $stmt->fetch())
		{
			$rejestracja = $r['rejestracja'];
			echo "<option>$rejestracja</option>";
		}
	echo '</select>
		<input type="submit" value="Wybierz"><br>
	</form>';
	}
	catch(PDOException $e)
		{
		}
		
	if (isset($_SESSION['msg']))
{
	echo '<div class="errordiv">'.$_SESSION['msg'].'</div>';
	unset($_SESSION['msg']);
}
			
	echo '<a href="admin.php">Powrot</a><br>';
	echo '<a href="index.php">Strona domowa</a><br>';
	?>
	
	</body>