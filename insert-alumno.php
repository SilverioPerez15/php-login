<?php 
	require 'database.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
        $apellidoP=$_POST['apellidoPaterno'];
        $apellidoM=$_POST['apellidoMaterno'];
		$matricula=$_POST['matricula'];
		$correo=$_POST['correo'];
        $idCarrera=$_POST['idCarrera'];
        $idUsuarioCrea=$_POST['idUsuarioCrea'];

		if(!empty($nombre) && !empty($apellidoP) && !empty($apellidoM) && !empty($matricula) && !empty($correo) && !empty($idCarrera) && !empty($idUsuarioCrea)){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$conn->prepare('INSERT INTO i17050133alumno(nombre,apellidoPaterno,apellidoMaterno,matricula,correo,idCarrera,idUsuarioCrea) VALUES(:nombre,:apellidoPaterno,:apellidoMaterno,:matricula,:correo,:idCarrera,:idUsuarioCrea)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellidoPaterno' =>$apellidoP,
					':apellidoMaterno' =>$apellidoM,
					':matricula' =>$matricula,
					':correo' =>$correo,
					':idCarrera' =>$idCarrera,
					':idUsuarioCrea' =>$idUsuarioCrea
					
				));
				header('Location: crud-alumno.php');
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
	<title>Nuevo Alumno</title>
	<link rel="stylesheet" href="assets/css/crud.css">
</head>
<body>
	<div class="contenedor">
		<h2>Tabla Alumno</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="apellidoPaterno" placeholder="Apellido paterno" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellidoMaterno" placeholder="Apellido materno" class="input__text">
				<input type="text" name="matricula" placeholder="Matricula" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="correo" placeholder="Correo electronico" class="input__text">
				<input type="text" name="idCarrera" placeholder="idCarrera" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="idUsuarioCrea" placeholder="idUsuarioCrea" class="input__text">
			</div>
			<div class="btn__group">
				<a href="crud-alumno.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>