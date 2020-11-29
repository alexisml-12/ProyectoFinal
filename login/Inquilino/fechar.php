<?php

    include("../../db.php"); 

    // session_start();

    $usuario = $_SESSION['username'];

    if (!isset($usuario)) {
    header("Location: ../../index.php");
    }

    $cedula = $_SESSION['cedula'];
    $reserva = $_SESSION['reserva'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Pagar arrendamiento</title>
    <style type="text/css">
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="interfazinq.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="logoutinq.php">Cerrar sesion</a>
  </form>
</nav>

<div class="container">
<br>
<?php if(isset($_SESSION['mensaje'])){ ?>
            <center><div style = "width: 400px;" class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div></center>
            <?php } ?>
            <h2 class="text-center">Registro de Reserva</h2>
            <br>
            <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Horario</th>
                            <th>Fecha de Reserva</th>
                            <th>Fecha de Entrega</th>
                            <th>Cedula Inquilino</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         
                        $query = "SELECT * FROM salon WHERE cedula_inquilino='$cedula' AND fecha_recibido='$reserva'";
                        $result = mysqli_query($conn, $query);

                        while($fila = mysqli_fetch_array($result)){ ?> <!--//RECORRE LA CONSULTA SQL-->

                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['horario']; ?></td>
                                <td><?php echo $fila['fecha_entrega']; ?></td>
                                <td><?php echo $fila['fecha_recibido']; ?></td>
                                <td><?php echo $fila['cedula_inquilino']; ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>