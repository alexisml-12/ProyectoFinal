<?php
    	
    require '../../db.php';
    date_default_timezone_set('America/Lima');
    $usuario = $_SESSION['username'];

    if (!isset($usuario)) {
      header("Location: ../../index.php");
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM `portero` WHERE usuario='$usuario' LIMIT 0, 25";
        $result = mysqli_query($conn, $query);

            if ($fila = mysqli_fetch_array($result)) {
                $nombre = $fila['nombre'];
                $apellido = $fila['apellido'];
            }
    }
    $hora=date('Y-m-d\TH:i');
    // echo $hora;
    if(isset($_POST['guardar'])){
        // $nombrep = $_POST['portero'];
        // $apellidop = $_POST['']
        $portero = $_POST['portero'];
        $ingresov= $_POST['ingresov'];
        $inicio = strtotime($ingresov);
        $inicio = Date('Y-m-d\TH:i',$inicio);
        // echo $inicio;
        // echo $ingresov;
        // $ingresovehi = date('Y/m/d H:i:s', $ingresov);
        $salidav= $_POST['salidav'];
        $inicio2 = strtotime($salidav);
        $inicio2 = date('Y-m-d\TH:i',$inicio2);
        // $salidavehi = date('Y/m/d H:i:s', $salidav);
        $ingresop= $_POST['ingresop'];
        $inicio3 = strtotime($ingresop);
        $inicio3 = date('Y-m-d\TH:i',$inicio3);
        // $ingresoper = date('Y/m/d H:i:s', $ingresop);
        $salidap= $_POST['salidap'];
        $inicio4 = strtotime($salidap);
        $inicio4 = date('Y-m-d\TH:i',$inicio4);
        // $salidaper = date('Y/m/d H:i:s', $salidap);
        $inventario=$_POST['inventario'];
        $notas = $_POST['notas'];

        $consulta = "INSERT INTO minuta(ingreso_vehiculo, salida_vehiculo, ingreso_persona, salida_persona, inventario, notas, portero) VALUES 
        ('$inicio','$inicio2','$inicio3','$inicio4','$inventario','$notas', '$portero')";
        
        // $resultado = mysqli_query($conn,$consulta);
        if (mysqli_query($conn, $consulta)) {
            $_SESSION['mensaje'] = "Se ha registrado exitosamente";
            $_SESSION['tipo_mensaje'] = "info";
            header("Location: registromin.php");
      } else {
            echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
      }
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
<form action="minuta.php" method="POST">
    <div class="container">
        <div class="row">
        

            <div class="col-sm-6">
                <h5>ID Portero</h5>
                <input readonly type="text" name="portero" value="<?php echo $id;?>" class="form-control">
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Portero</h5>
                <input readonly type="text" name="porteron" value="<?php echo $nombre." ".$apellido;?>" class="form-control">
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Ingreso de vehiculos</h5>
                <input type="datetime-local" name="ingresov" step="1" value="0000-00-00 00:00:00" class="form-control">
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Salida de vehiculos</h5>
                <input type="datetime-local" name="salidav" step="1" class="form-control">
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Ingreso de personas</h5>
                <input type="datetime-local" name="ingresop" step="1" class="form-control">
            </div>
            <div class="col-sm-6">
                <h5>Salida de personas</h5>
                <input type="datetime-local" name="salidap" step="1" class="form-control">
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Inventario</h5>
                <input type="text" name="inventario" class="form-control">
            </div>
            <div class="col-sm-6">
                <h5>Notas</h5>
                <textarea name="notas" class="form-control" rows="3"></textarea>
            </div>

        <br>

        </div>
        </div>
    </div>
    <div class="col-sm-6"><center>
            <input type="submit" name="guardar" class="btn btn-success" value="Guardar registro">
            </center>
    </form>
</body>
</html>