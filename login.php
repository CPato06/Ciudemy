<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesion</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

  </head>
  <body>
    <div class="container w-100 bg-primary mt-5 rounded shadow">
      <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

        </div>
        <div class="col bg-white p-5 rounded-end">
          <div class="text-end">
            <img src="css/img/logo.png" width="48" alt="">
          </div>
          <h2 class="fw-bold text-center py-5">Bienvenido</h2>
        
          <form action="valida.php" method="POST">
            <div class="mb-4">
              <label for="email" class="form-label">Correo Electronico</label>
              <input type="email" class="form-control" name="correo" required>
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="contrasena" required>
            </div>
            <div class="mb-4 form-check">
              <input type="checkbox" name="connected" class="form-check-input">
              <label for="connected" class="form-check-label">Mantenerme conectado</label>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary" type="button">Iniciar Sesion</button>
            </div>

            <div class="my-3">
              <span>No tienes cuenta? <a href="signup.php">Registrate</a></span> <br>  
              <span><a href="#">Recuperar Password</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>