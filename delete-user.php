<?php 

	require 'database.php';
	if(isset($_GET['idUser'])){
		$idUser=(int) $_GET['idUser'];
		$delete=$conn->prepare('DELETE FROM i17050133user WHERE idUser =:idUser');
		$delete->execute(array(
			':idUser'=>$idUser
		));
		header('Location: crud-user.php');
	}else{
		header('Location: crud-user.php');
	}
 ?>