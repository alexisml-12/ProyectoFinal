<?php
    	
    require '../../db.php';
    // date_default_timezone_set('America/Lima');
    $usuario = $_SESSION['username'];

    if (!isset($usuario)) {
      header("Location: ../../index.php");
    }
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM minuta WHERE id=$id";
        $result = mysqli_query($conn, $query);
    
        if(mysqli_num_rows($result) == 1) { //mysqli_num_rows PARA COMPROBAR CUANTA FILAS TIEN EL RESULTADO
            $fila = mysqli_fetch_array($result);
            $ingresov= $fila['ingreso_vehiculo'];
            $dateiv = date("Y-m-d\TH:i:s", strtotime($ingresov));
            $salidav= $fila['salida_vehiculo'];
            $datesv = date("Y-m-d\TH:i:s", strtotime($salidav));
            $ingresop= $fila['ingreso_persona'];
            $dateip = date("Y-m-d\TH:i:s", strtotime($ingresop));
            $salidap= $fila['salida_persona'];
            $datesp = date("Y-m-d\TH:i:s", strtotime($salidap));
            $inventario=$fila['inventario'];
            $notas = $fila['notas'];
        } 
    }

    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $ingresov = $_POST['ingresov'];
        $salidav = $_POST['salidav'];
        $ingresop = $_POST['ingresop'];
        $salidap = $_POST['salidap'];
        $inventario = $_POST['inventario'];
        $notas = $_POST['notas'];
    
        $query = "UPDATE minuta SET ingreso_vehiculo='$ingresov', salida_vehiculo='$salidav', 
        ingreso_persona='$ingresop', salida_persona='$salidap', inventario='$inventario' WHERE id=$id";
        mysqli_query($conn, $query);
    
        $_SESSION['mensaje'] = "Mensaje actualizado satisfactoriamente";
        $_SESSION['tipo_mensaje'] = "info";
        header("Location: registromin.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Porteria</title>
    <style type="text/css">
    
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="interfazport.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="logoutadmn.php">Cerrar sesion</a>
  </form>
</nav>
<h1 class="text-center">Minuta</h1>
<br>
<form action="editarmin.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h5>Ingreso de vehiculos</h5>
                <input type="datetime-local" name="ingresov" step="1" class="form-control" value="<?php echo $dateiv; ?>">
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Salida de vehiculos</h5>
                <input type="datetime-local" name="salidav" step="1" class="form-control" value="<?php echo $datesv; ?>">
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Ingreso de personas</h5>
                <input type="datetime-local" name="ingresop" step="1" class="form-control" value="<?php echo $dateip; ?>">
            </div>
            <div class="col-sm-6">
                <h5>Salida de personas</h5>
                <input type="datetime-local" name="salidap" step="1" class="form-control" value="<?php echo $datesp; ?>">
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Inventario</h5>
                <input type="text" name="inventario" class="form-control" value="<?= $inventario?>">
            </div>
            <div class="col-sm-6">
                <h5>Notas</h5>
                <textarea name="notas" class="form-control" rows="3" value="<?php echo $notas; ?>"></textarea>
            </div>

        <br>

        </div>
        </div>
    </div>
    <div class="col-sm-6"><center>
            <input type="submit" name="actualizar" class="btn btn-success" value="Actualizar registro">
            </center>
    </form>
</body>
</html>