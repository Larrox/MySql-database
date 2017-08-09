<?php
session_start();
include_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Mirex</title>
</head>
<body>
Witaj na stronie Mirex<br>
Aktualnia ilosc tirow to:
<?php
try
	{

	$pdo = connect();
				
	$stmt = $pdo->prepare("SELECT idTiry FROM tiry");
			
	$stmt->execute();
	echo $stmt->rowCount();
	}
catch(PDOException $e)
	{
	}
?>
<pre>
                  _______________________________________________________
                  |                                                      |
             /    |                                                      |
            /---, |                                                      |
       -----# ==| |                                                      |
       | :) # ==| |                                                      |
  -----'----#   | |______________________________________________________|
  |)___()  '#   |______====____   \___________________________________|
 [_/,-,\"--"------ //,-,  ,-,\\\   |/             //,-,  ,-,  ,-,\\ __#
   ( 0 )|===******||( 0 )( 0 )||-  o              '( 0 )( 0 )( 0 )||
----'-'--------------'-'--'-'-----------------------'-'--'-'--'-'--------------
</pre>

<?php
if (isset($_SESSION['id'])){
	$login = $_SESSION['login'];
	echo "Zalogowany jako: $login <br>";
	echo '<a href="admin.php">Panel sterowania</a><br>';
	echo '<a href="logout.php">Wyloguj</a><br>';
}else{
	echo '<a href="login.php">Zaloguj</a><br>';
}
?>
</body>

</html>