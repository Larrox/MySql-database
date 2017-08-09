<?php
session_start();
include_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<title>Logowanie</title>

<style>
.errordiv {
    background-color: red;
}
</style>
</head>

<body>
<form action="login_h.php" method="post">
Login:<br>
<input type="text" name="login"><br>
Hasło:<br>
<input type="password" name="pass"><br>
<input type="submit" value="zaloguj">
</form>

<?php
if (isset($_SESSION['msg']))
{
	echo '<div class="errordiv">'.$_SESSION['msg'].'</div>';
	unset($_SESSION['msg']);
}

if (isset($_SESSION['id']))
{
	$id = $_SESSION['id'];
	$login = $_SESSION['login'];
	header("Location: index.php");	
}

echo '<a href="index.php">Strona domowa</a><br>';
?>
</body>

</html> 