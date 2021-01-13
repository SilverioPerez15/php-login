<?php
	require 'database.php';

	$sentencia_select=$conn->prepare('SELECT * FROM i17050133carrera ORDER BY idCarrera ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conn->prepare('
			SELECT *FROM i17050133carrera WHERE nombre LIKE :campo OR clave LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="assets/css/crud.css">
	<link rel="stylesheet" href="assets/css/style-header-table.css">
</head>
<body>
	<?php require 'partials/header.php' ?>

	<div class="contenedor">
		<h2>Tabla Carrera</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar nombre o clave" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert-carrera.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>idCarrera</td>
				<td>Nombre</td>
				<td>Clave</td>
				<td>Duracion en semestre</td>
                <td>Siglas</td>
                <td>Estatus</td>
                <td>idUsuarioCrea</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['idCarrera']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['clave']; ?></td>
					<td><?php echo $fila['duracionSemestre']; ?></td>
                    <td><?php echo $fila['siglas']; ?></td>
                    <td><?php echo $fila['estatus']; ?></td>
                    <td><?php echo $fila['idUsuarioCrea']; ?></td>
					<td><a href="update-user.php?idUser=<?php echo $fila['idCarrera']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete-user.php?idUser=<?php echo $fila['idCarrera']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>