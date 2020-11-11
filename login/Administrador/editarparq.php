<?php
require "../../db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM parqueadero WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) { //mysqli_num_rows PARA COMPROBAR CUANTA FILAS TIEN EL RESULTADO
        $fila = mysqli_fetch_array($result);
        $id = $fila['id'];
        $n_espacios = $fila['n_espacios'];
        $placa_vehiculo = $fila['placa_vehiculo'];
    } 
}

if(isset($_POST['actualizar'])){
    $id = $_GET['id'];
    $n_espacios = $_POST['n_espacios'];
    $placa_vehiculo = $_POST['placa_vehiculo'];

    $query = "UPDATE parquedero AS p
    JOIN vehiculo AS v
    ON p.placa_vehiculo=v.placa
    SET p.placa_vehiculo=$placa_vehiculo, v.placa=$placa_vehiculo
    WHERE p.id=$id";
    mysqli_query($conn, $query);

    $_SESSION['mensaje'] = "Mensaje actualizado satisfactoriamente";
    $_SESSION['tipo_mensaje'] = "info";
    header("Location: consultaparq.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Editar parquedero</title>
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
            <form action="editarparq.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <br>
                <h6>Numero de espacios:</h6>
                <input class="form-control" type="text" name="n_espacios" value="<?php echo $n_espacios; ?>" placeholder="*Numero de espacios">
                <br>
                <h6>Placa del Vehiculo:</h6>
                <input class="form-control" type="text" name="placa_vehiculo" value="<?php echo $placa_vehiculo; ?>" placeholder="*PLaca del Vehiculo">
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