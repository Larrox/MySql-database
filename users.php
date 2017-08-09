<?php
session_start();
include_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<title>Uzytkownicy</title>

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
				
				$stmt = $pdo->prepare("SELECT id, login FROM uzytkownicy");
				$stmt->execute();
				
			echo "<table border = 1>
				<tr>
				<th>id</th>
				<th>login</th>
				</tr>";

				while ($r = $stmt->fetch())
				{
					$id = $r['id'];
					$login = $r['login'];
						echo "<tr>
				<td>$id</td>
				<td>$login</td>
				</tr>";
				}
				echo "</table>";
			}
			catch(PDOException $e)
			{
			}
				
?>

Dodaj<br>
<form action="add_user_h.php" method="post">
Login:<br>
<input type="text" name="login"><br>
Hasło:<br>
<input type="password" name="pass"><br>
<input type="submit" value="Dodaj">
</form>
<br>
<br>
<br>
Usun<br>
<form action="del_user_h.php" method="post">
Login:<br>
<input type="text" name="login"><br>
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