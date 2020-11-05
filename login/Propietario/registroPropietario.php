<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Registro Propietario</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="../../index.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="../login.php">Iniciar Sesion</a>
  </form>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <br>
            <center><h2>Registrate como Propietario</h2></center>
            <br>
            <form action="" method="POST">
                <input class="form-control" type="text" name="cedula" placeholder="*Cedula">
                <br>
                <input class="form-control" type="text" name="nombre" placeholder="*Nombre/s">
                <br>
                <input class="form-control" type="text" name="apellido" placeholder="*Apellido/s">
                <br>
                <input class="form-control" type="text" name="telefono" placeholder="*Telefono">
                <br>
                <input class="form-control" type="password" name="contraseña" placeholder="*Contraseña">
                <br>
                <center><input type="submit" class="btn btn-info" value="Registrarme"></center>
                <br>
            </form>
        </div>    
    </div>
</div>





    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>