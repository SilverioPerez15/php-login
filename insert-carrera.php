<?php 
	require 'database.php';
	
	if(isset($_POST['guardar'])){
        $nombre=$_POST['nombre'];
        $clave=$_POST['clave'];
        $duracionSem=$_POST['duracionSemestre'];
        $siglas=$_POST['siglas'];
        $idUsuarioCrea=$_POST['idUsuarioCrea'];

		if(!empty($nombre) && !empty($clave) && !empty($duracionSem) && !empty($siglas) && !empty($idUsuarioCrea)){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$conn->prepare('INSERT INTO i17050133carrera (nombre,clave,duracionSemestre,siglas,idUsuarioCrea) VALUES (:nombre,:clave,:duracionSemestre,:siglas,:idUsuarioCrea)');
				$consulta_insert->execute(array(
                    ':nombre' =>$nombre,
					':clave' =>$clave,
					':duracionSemestre' =>$duracionSem,
					':siglas' =>$siglas,
					':idUsuarioCrea' =>$idUsuarioCrea
					
				));
				header('Location: crud-carrera.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nueva Carrera</title>
	<link rel="stylesheet" href="assets/css/crud.css">
</head>
<body>
	<div class="contenedor">
		<h2>Tabla Carrera</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="clave" placeholder="Clave" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="duracionSemestre" placeholder="Duracion en semestres" class="input__text">
                <input type="text" name="siglas" placeholder="Siglas" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="idUsuarioCrea" placeholder="idUsuarioCrea" class="input__text">
			</div>
			<div class="btn__group">
				<a href="crud-carrera.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>