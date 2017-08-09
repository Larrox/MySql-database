<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Panel sterowania</title>
</head>

<body>
<?php
include_once('db.php');
if (isset($_SESSION['id']))
{	if($_SESSION['id']==1){
		echo '<a href="users.php">Zarzadzaj uzytkownikami</a><br>';
	}
	echo '<a href="trucks.php">Zarzadzaj tirami</a><br>';
	echo '<a href="routes.php">Zarzadzaj trasami</a><br>';
	echo '<a href="stats.php">Statystyka</a><br>';
}
echo '<a href="index.php">Strona domowa</a><br>';
?>
</body>

</html> 