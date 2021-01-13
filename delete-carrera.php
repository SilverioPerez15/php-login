<?php 

	require 'database.php';
	if(isset($_GET['idCarrera'])){
		$idUser=(int) $_GET['idCarrera'];
		$delete=$conn->prepare('DELETE FROM i17050133carrera WHERE idCarrera =:idCarrera');
		$delete->execute(array(
			':idCarrera'=>$idCarrera
		));
		header('Location: crud-user.php');
	}else{
		header('Location: crud-user.php');
	}
 ?>