<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT idUser, name, email, password FROM i17050133user WHERE idUser = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to your App</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/list.css">
</head>
<body>
    <?php require 'partials/header.php' ?>
    
    <?php if(!empty($user)): ?>
      <br> Bienvenido <?= $user['name']; ?>
      <br>Se ha iniciado sesion correctamente
      <a href="logout.php">Logout</a>

      <div class="container">
        <h2>Tablas</h2>
        <ul>
            <li><a href="crud-user.php">Usuario</a></li>
            <li><a href="crud-alumno.php">Alumno</a></li>
            <li><a href="crud-carrera.php">Carrera</a></li>
        </ul>
      </div>
    <?php else: ?>
      <h1>Iniciar sesion o Registrarse</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>


    <?php endif; ?>
</body>
</html>