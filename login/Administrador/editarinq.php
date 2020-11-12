<?php
require "../../db.php";

$usuario = $_SESSION['username'];

if (!isset($usuario)) {
  header("Location: ../../index.php");
}

if(isset($_GET['cedula'])){
    $cedula = $_GET['cedula'];
    $query = "SELECT * FROM inquilino WHERE cedula=$cedula";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) { //mysqli_num_rows PARA COMPROBAR CUANTA FILAS TIEN EL RESULTADO
        $fila = mysqli_fetch_array($result);
        $cedula = $fila['cedula'];
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $telefono = $fila['telefono'];
        $inquilinos = $fila['n_inquilinos'];
        $usuario = $fila['usuario'];
        $clave = $fila['contraseña'];
    } 
}

if(isset($_POST['actualizar'])){
    $usuario2 = $_SESSION['username'];
    $cedula = $_GET['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $inquilinos = $_POST['lista'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['contraseña'];

    $query = "UPDATE inquilino SET nombre='$nombre', apellido='$apellido', telefono='$telefono', 
    n_inquilinos='$inquilinos', usuario='$usuario', contraseña='$clave' WHERE cedula=$cedula";
    mysqli_query($conn, $query);

    $_SESSION['mensaje'] = "Mensaje actualizado satisfactoriamente";
    $_SESSION['tipo_mensaje'] = "info";
    header("Location: consultainquilino.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Editar inquilino</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="../Administrador/interfazAdm.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="#">Soporte</a>
    <a class="navbar-brand" href="logoutadmn.php">Cerrar Sesion</a>
  </form>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <br>
            <center><h2>Editar Inquilino</h2></center>
            <br>
            <form action="editarinq.php?cedula=<?php echo $_GET['cedula']; ?>" method="POST">
                <h6>Cedula:</h6>
                <input class="form-control" type="text" name="cedula" value="<?php echo $cedula; ?>" placeholder="*Cedula" disabled>
                <br>
                <h6>Nombre:</h6>
                <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" placeholder="*Nombre/s">
                <br>
                <h6>Apellido:</h6>
                <input class="form-control" type="text" name="apellido" value="<?php echo $apellido; ?>" placeholder="*Apellido/s">
                <br>
                <h6>Telefono:</h6>
                <input class="form-control" type="text" name="telefono" value="<?php echo $telefono; ?>" placeholder="*Telefono">
                <br>
                <h6>Numero de Inquilinos:</h6>
                <select class="form-control" id="lista" name="lista">
                    <option selected><?php echo $inquilinos; ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <h6>Usuario:</h6>
                <input class="form-control" type="text" name="usuario" value="<?php echo $usuario; ?>" placeholder="*Usuario">
                <br>
                <h6>Contraseña:</h6>
                <input class="form-control" type="password" name="contraseña" value="<?php echo $clave; ?>" placeholder="*Contraseña">
                <br>
                <center><input type="submit" class="btn btn-success" name="actualizar" value="Actualizar" required></center>
                <br>
            </form>
        </div>    
    </div>
</div>





    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>