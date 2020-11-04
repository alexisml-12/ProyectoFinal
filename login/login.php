<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Iniciar Sesion</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="../index.php">AD Conjuntos Residenciales</a>
    </nav>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/login.css" rel="stylesheet">
  </head>
  <br>
  <br>
  <br>  
    <body class="text-center">
        <div class="container">
            <form class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
                <select class="form-control">
                    <option selected>Seleccionar Usuario...</option>
                    <option value="0">Administrador</option>
                    <option value="1">Portero</option>
                    <option value="2">Propietario</option>
                    <option value="3">Inquilino</option>
                </select>
                <br>
                <label for="usuario" class="sr-only">Usuario</label>
                <input type="text" id="usuario" class="form-control" placeholder="Usuario" required autofocus>
                <label for="contrasena" class="sr-only">Password</label>
                <input type="password" id="contrasena" class="form-control" placeholder="Contraseña" required>
                <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
                <br>
                <a href="../login/registroInquilino.php" class="btn btn-lg btn-primary btn-block">Registrarme</a>
            </form>
        </div>
    </body>
</html>
