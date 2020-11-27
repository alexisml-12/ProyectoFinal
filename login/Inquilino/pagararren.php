<?php 

    require '../../db.php';
    date_default_timezone_set('America/Lima');
    $usuario = $_SESSION['username'];

    if (!isset($usuario)) {
    header("Location: ../../index.php");
    }

    
    $query = "SELECT * FROM `inquilino` WHERE usuario='$usuario'";
    $result = mysqli_query($conn, $query);

    if ($fila = mysqli_fetch_array($result)) {
        $cedula = $fila['cedula'];
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $apte = $fila['apartamento'];
    }

    if(isset($_POST['guardar'])){
        $apte = $_POST['apartamento'];
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $concepto = $_POST['concepto'];
        $t_pagar = $_POST['pago'];
        $cuenta = $_POST['cuenta'];
        $fecha= $_POST['fecha'];
        $inicio2 = strtotime($fecha);
        $inicio2 = date('Y-m-d\TH:i',$inicio2);

        $consulta = "INSERT INTO dt_apart_inqui(id_apartamentos, cedula_inquilino, concepto, pago, n_cuenta, fecha) VALUES 
        ('$apte','$cedula','$concepto','$t_pagar','$cuenta','$inicio2')";
        $resultado = mysqli_query($conn,$consulta);

        if ($resultado) {
            $_SESSION['mensaje'] = "El pago se ha realizado correctamente";
            $_SESSION['tipo_mensaje'] = "info";
            $_SESSION['cedula'] = $cedula;
            header("Location: pagar.php");
        }
    }
    $hora = Date('Y-m-d\TH:i',time());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Pagar arrendamiento</title>
    <style type="text/css">
        .invisible {
        visibility: hidden;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="interfazinq.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="logoutinq.php">Cerrar sesion</a>
  </form>
</nav><br>

<h2 class="text-center">Pagar Arrendamiento</h2>
<br>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="pagararren.php" method="post">
                    <div class="invisible"><input type="datetime-local" name="fecha" value="<?= $hora;?>"></div>
                    <h5 style="margin-left:200px;">Apartamento:</h5>
                    <br>
                    <h5 style="margin-left:200px;">Cedula Inquilino:</h5>
                    <br>
                    <h5 style="margin-left:200px;">Nombre Inquilino:</h5>
                    <br>
                    <h5 style="margin-left:200px; margin-top:8px;">Concepto:</h5>
                    <br>
                    <h5 style="margin-left:200px;">Total a pagar:</h5>
                    <br>
                    <h5 style="margin-left:200px; margin-top:10px;">Numero de cuenta:</h5>
                    </div>
                    <div class="col-6">
                    <input type="text" name="apartamento" class="form-control" value="<?php echo $apte?>" style="margin-left:-190px; margin-top:30px;" readonly>
                    <br>
                    <input type="text" name="cedula" class="form-control" value="<?php echo $cedula?>" style="margin-left:-190px; margin-top:-10px;" readonly>
                    <br>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $nombre." ".$apellido?>" style="margin-left:-190px; margin-top:-10px;" readonly>
                    <br>
                    <select class="form-control" name="concepto" id="inquilinos" style="margin-left:-190px;" required>
                            <option selected>Seleccione el concepto...</option>
                            <option value="Arrendamiento">Arrendamiento</option>
                        </select>
                    <br>
                    <input type="text" name="pago" class="form-control" style="margin-left:-190px;">
                    <br>
                    <input type="text" name="cuenta" class="form-control" style="margin-left:-190px;">
                    <br>
                    <input type="submit" name="guardar" class="btn btn-success" value="Realizar Pago" style="margin-left:12px;">
                </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>