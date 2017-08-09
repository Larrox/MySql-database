<?php
    
	session_start();
	
	include_once('db.php');
	
	if ((isset($_POST['rejestracja'])) && 
			(isset($_POST['rocznik'])) &&
			(isset($_POST['spalanie'])))
	{
	
		$rejestracja = $_POST['rejestracja'];
		$rocznik = $_POST['rocznik'];
		$spalanie = $_POST['spalanie'];
		
		try
		{

            $pdo = connect();
			//ZLA !!!!!!!!!!!!
			//$stmt = $pdo->prepare("SELECT * FROM uzytkownicy WHERE //login='$login' AND  pass=SHA1('$pass')");
			
			$stmt = $pdo->prepare("SELECT rejestracja FROM tiry WHERE rejestracja=:r");
			$stmt->bindParam(':r',$rejestracja, PDO::PARAM_STR, 7);
			$stmt->execute();
			
			if ($stmt->rowCount() == 0)
			{
				$stmt = $pdo->prepare("INSERT INTO tiry (rejestracja, rocznik, spalanie) VALUES (:rejestracja, :rocznik, :spalanie)");
				$stmt->bindParam(':rejestracja',$rejestracja, PDO::PARAM_STR, 7);
				$stmt->bindParam(':rocznik',$rocznik, PDO::PARAM_INT);
				$stmt->bindParam(':spalanie',$spalanie, PDO::PARAM_INT);
				$stmt->execute();
				
			
			}else
			{
				$_SESSION['msg'] = "W bazie jest juz tir o tym numerze rejestracyjnym";
			}
			
		}
		catch(PDOException $e)
		{
	
			$_SESSION['msg'] = "Blad polaczenia";
		}
			
	}
	
	header("Location: trucks.php");