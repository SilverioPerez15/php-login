<?php 
	require 'database.php';
	
	if(isset($_POST['guardar'])){
        $correo=$_POST['email'];
        $nombre=$_POST['name'];
		$contraseña=$_POST['password'];

		if(!empty($correo) && !empty($nombre) && !empty($contraseña)){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$conn->prepare('INSERT INTO i17050133user (email,name,password) VALUES (:email,:name,:password)');
				$consulta_insert->execute(array(
                    ':email' =>$correo,
                    ':name' =>$nombre,
                    //$contraseña = password_hash('password', PASSWORD_BCRYPT),
					':password' =>$contraseña
					
				));
				header('Location: crud-user.php');
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
	<title>Nuevo Usuario</title>
	<link rel="stylesheet" href="assets/css/crud.css">
</head>
<body>
	<div class="contenedor">
		<h2>Tabla Usuario</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="email" placeholder="Correo electronico" class="input__text">
				<input type="text" name="name" placeholder="Nombre" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="password" placeholder="Contraseña" class="input__text">
			</div>
			<div class="btn__group">
				<a href="crud-user.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>