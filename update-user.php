<?php
	require 'database.php';

	if(isset($_GET['idUser'])){
		$idUser=(int) $_GET['idUser'];

		$buscar_id=$conn->prepare('SELECT * FROM i17050133user WHERE idUser =:idUser LIMIT 1');
		$buscar_id->execute(array(
			':idUser'=>$idUser
		));
		$resultado=$buscar_id->fetch();
	}
	else
	{
		header('Location: crud-user.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['name'];
		$correo=$_POST['email'];
		//$contraseña=$_POST['password'];
		$idUser=(int) $_GET['idUser'];

		if(!empty($nombre) && !empty($correo))
		{
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}
			else
			{
				$consulta_update=$conn->prepare(' UPDATE i17050133user SET  
					nombre=:name,
					correo=:email
					WHERE idUser=:idUser;'
				);
				$consulta_update->execute(array(
					':name' =>$nombre,
					':email' =>$correo,
					':idUser' =>$idUser
				));
				header('Location: crud-user.php');
			}
		}
		else
		{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Usuario</title>
	<link rel="stylesheet" href="assets/css/crud.css">
</head>
<body>
	<div class="contenedor">
		<h2>Editar Usuario</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="email" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text">
				<input type="text" name="name" value="<?php if($resultado) echo $resultado['name']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="crud-user.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
