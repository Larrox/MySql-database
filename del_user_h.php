<?php
session_start();
include_once('db.php');
if(isset($_POST['login'])){
	
	$login = $_POST['login'];
	

	
	try
		{
			$pdo = connect();
			
			$stmt = $pdo->prepare("SELECT id, login FROM uzytkownicy WHERE login=:login");
			$stmt->bindParam(':login',$login, PDO::PARAM_STR, 45);
			$stmt->execute();
			
			if ($stmt->rowCount() == 1){
				if($login==$_SESSION['login']){
					$_SESSION['msg'] = "Nie mozesz usunac admina";
				}else{
					$stmt = $pdo -> prepare("DELETE FROM uzytkownicy WHERE login=:login");
					$stmt -> bindParam(':login',$login, PDO::PARAM_STR, 45);
					$stmt -> execute();
				}
			}else{
				
				$_SESSION['msg'] = "Nie ma takiego uzytkownika";
			}
        
		}
		catch(PDOException $e)
		{
			//?? na ekran 
			//echo 'Błąd połączenia: '.$e->getMessage();
			//$_SESSION['err'] = 'Błąd połączenia: '.$e->getMessage();
			//email
			$_SESSION['msg'] = "Blad polaczenia";
		}
}
header("Location: users.php");