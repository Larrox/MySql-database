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
			//ZLA !!!!!!!!!!!!
			//$stmt = $pdo->prepare("SELECT * FROM uzytkownicy WHERE //login='$login' AND  pass=SHA1('$pass')");
			
			$stmt = $pdo->prepare("SELECT id, login FROM uzytkownicy WHERE login=:login AND  pass=SHA1(:pass)");
			$stmt->bindParam(':login',$login, PDO::PARAM_STR, 45);
			$stmt->bindParam(':pass',$pass, PDO::PARAM_STR, 40);
			$stmt->execute();
			
			if ($stmt->rowCount() == 1)
			{
				//print_r($stmt->fetch());
				$r = $stmt->fetch();
				$_SESSION['id'] = $r['id'];
				$_SESSION['login']= $r['login'];
			}
			else
			{
				//blad ? gdy > 1
				$_SESSION['msg'] = "Niepoprawny login lub hasło";
			}
		}
		catch(PDOException $e)
		{
			//?? na ekran 
			//echo 'Błąd połączenia: '.$e->getMessage();
			//$_SESSION['err'] = 'Błąd połączenia: '.$e->getMessage();
			//email
		}
			
	}
	
	header("Location: login.php");

