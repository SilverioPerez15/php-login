<?php 

	require 'database.php';
	if(isset($_GET['idAlumno'])){
		$idUser=(int) $_GET['idAlumno'];
		$delete=$conn->prepare('DELETE FROM i17050133alumno WHERE idAlumno =:idAlumno');
		$delete->execute(array(
			':idAlumno'=>$idAlumno
		));
		header('Location: crud-user.php');
	}else{
		header('Location: crud-user.php');
	}
 ?>