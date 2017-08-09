<?php
    
	session_start();
	
	include_once('db.php');
	
	if ((isset($_POST['dystans']))){
		
		$id = $_SESSION['idTiry'];
		$d = $_POST['dystans'];
		try
		{

            $pdo = connect();			
			
			$stmt = $pdo->prepare("INSERT INTO trasy (Tiry_idTiry, dystans) VALUES (:id, :d)");
			$stmt->bindParam(':id',$id, PDO::PARAM_STR, 45);
			$stmt->bindParam(':d',$d, PDO::PARAM_INT);
			$stmt->execute();
		}catch(PDOException $e)
		{
			$_SESSION['msg'] = "Blad polaczenia";
		}
	}
	
	header("Location: routes.php");