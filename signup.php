<?php 
    require 'database.php';

    $message = '';

  if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO i17050133user (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Nuevo usuario creado con exito';
    } else {
      $message = 'Ocurrio un problema al intentar crear la cuenta';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
    <input type="text" name="name" placeholder="Enter your name">
    <input type="text" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter your password">
    <input type="password" name="confirm_password" placeholder="Confirm your password">
    <input type="submit" value="submit">
</body>
</html>