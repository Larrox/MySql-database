<?php
    
	session_start();
	
	include_once('db.php');
	
	if ((isset($_POST['login'])) && 
			(isset($_POST['pass'])))
	{
	
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		
		try
		{

            $pdo = connect();			
			
			$stmt = $pdo->prepare("SELECT id, login FROM uzytkownicy WHERE login=:login");
			$stmt->bindParam(':login',$login, PDO::PARAM_STR, 45);
			$stmt->execute();
			
			if ($stmt->rowCount() == 0)
			{
						
				$stmt = $pdo->prepare("INSERT INTO uzytkownicy (login, pass) VALUES (:login, SHA1(:pass))");
				$stmt->bindParam(':login',$login, PDO::PARAM_STR, 45);
				$stmt->bindParam(':pass',$pass, PDO::PARAM_STR, 40);
				$stmt->execute();
			}
			else
			{
				$_SESSION['msg'] = "Wybrany login jest zajety";
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
