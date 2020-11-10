<?php
require "../../db.php";

if(isset($_GET['id'])){
    $cedula = $_GET['id'];
    $query = "SELECT * FROM personal_de_trabajo WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) { //mysqli_num_rows PARA COMPROBAR CUANTA FILAS TIEN EL RESULTADO
        $fila = mysqli_fetch_array($result);
        $id = $fila['id'];
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $cargo = $fila['cargo'];
    } 
}

if(isset($_POST['actualizar'])){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cargo = $_POST['cargo'];

    $query = "UPDATE personal_de_trabajo SET nombre='$nombre', apellido='$apellido', cargo='$cargo' 
    WHERE id=$id";
    mysqli_query($conn, $query);

    $_SESSION['mensaje'] = "Mensaje actualizado satisfactoriamente";
    $_SESSION['tipo_mensaje'] = "info";
    header("Location: consultapersonal.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Editar personal de trabajo</title>
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
            <center><h2>Editar Personal De Trabajo</h2></center>
            <br>
            <form action="editarpersonal.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <br>
                <h6>Nombre:</h6>
                <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" placeholder="*Nombre/s">
                <br>
                <h6>Apellido:</h6>
                <input class="form-control" type="text" name="apellido" value="<?php echo $apellido; ?>" placeholder="*Apellido/s">
                <br>
                <h6>Cargo:</h6>
                <input class="form-control" type="text" name="cargo" value="<?php echo $cargo; ?>" placeholder="*Cargo">
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