<?php
session_start();
include_once('db.php');
if(isset($_POST['rejestracja'])){
	
	$rejestracja = $_POST['rejestracja'];
	

	
	try
		{
			$pdo = connect();
			
			$stmt = $pdo->prepare("SELECT rejestracja FROM tiry WHERE rejestracja=:r");
			$stmt->bindParam(':r',$rejestracja, PDO::PARAM_STR, 7);
			$stmt->execute();
			
			if ($stmt->rowCount() == 1){
				
				$stmt = $pdo -> prepare("DELETE FROM tiry WHERE rejestracja=:r");
				$stmt -> bindParam(':r',$rejestracja, PDO::PARAM_STR, 7);
				$stmt -> execute();
			}else
			{
				$_SESSION['msg'] = "W bazie nie ma tira o tym numerze rejestracyjnym";
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
header("Location: trucks.php");