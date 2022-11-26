<?php
  require 'database.php';

  

if (!empty($_POST['nombre']) && !empty($_POST['ap_paterno']) && !empty($_POST['correo']) && !empty($_POST['contrasena'])) {  
  $sql = "INSERT INTO usuario (nombre, ap_paterno, ap_materno, username, correo, contrasena, tipo_usuario_idusuario) 
  VALUES (:nombre, :ap_paterno, :ap_materno, :username, :correo, :contrasena, 1)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':nombre', $_POST['nombre']);
  $stmt->bindParam(':ap_paterno', $_POST['ap_paterno']);
  $stmt->bindParam(':ap_materno', $_POST['ap_materno']);
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->bindParam(':correo', $_POST['correo']);
  $stmt->bindParam(':contrasena', $_POST['contrasena']);
  if ($stmt->execute()) {
    header('location:login.php');
  } else {
    $message = 'Error al registrar al usuario';
  }
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Registrate</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>

  <div class="container w-100 bg-primary mt-1 rounded shadow">
      <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

        </div>
        <div class="col bg-white p-5 rounded-end">
          <div class="text-end">
            <img src="css/img/logo.png" width="48" alt="">
          </div>
          <h2 class="fw-bold text-center py-5">Bienvenido</h2>
        
          <form action="signup.php" method="POST">
            <div class="mb">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb">
              <label for="appat" class="form-label">Apellido Paterno</label>
              <input type="text" class="form-control" name="ap_paterno" required>
            </div>
            <div class="mb">
              <label for="apmat" class="form-label">Apellido Materno</label>
              <input type="text" class="form-control" name="ap_materno" >
            </div>
            <div class="mb">
              <label for="email" class="form-label">Correo Electronico</label>
              <input type="email" class="form-control" name="correo" required>
            </div>
            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="contrasena" required>
            </div>
            <div class="d-grid gap-2 ">
              <button type="submit" class="btn btn-primary" type="button">Registrate</button>
            </div>

            <div class="my-3">
              <span>Ya tienes cuenta? <a href="login.php">Inicia Sesion</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>