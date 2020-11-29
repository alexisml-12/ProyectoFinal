<?php 

    require '../../db.php';
    date_default_timezone_set('America/Lima');
    $hora=date('Y-m-d\TH:i');
    $usuario = $_SESSION['username'];

    if (!isset($usuario)) {
      header("Location: ../../index.php");
    }

    if (isset($_GET['cedula'])) {
        $cedula = $_GET['cedula'];
        $query = "SELECT * FROM `salon` WHERE cedula_inquilino='$cedula' ORDER BY id DESC LIMIT 0, 25";
        $result = mysqli_query($conn, $query);

            if ($fila = mysqli_fetch_array($result)) {
                $fecha = $fila['fecha_recibido'];
                $i = $fila['id'];
                // echo $fecha;
            }
    }

    if(isset($_POST['guardar'])){
        $id = $_POST['id'];
        $cedulai = $_POST['inquilino'];
        $horario = $_POST['horario'];
        $reserva = $_POST['reserva'];
        $entrega = $_POST['entrega'];

        $query = "INSERT INTO salon (horario, fecha_entrega, fecha_recibido, cedula_inquilino) 
                  VALUES('$horario', '$entrega', '$reserva', '$cedulai')";

        $query2 = "INSERT INTO dt_salon_inquilino(cedula_inquilino, id_salon, fecha)  
                  VALUES('$cedulai', '$i', '$entrega')";

        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);

        if ($result && $result2) {
            $_SESSION['mensaje'] = "Ha hecho su reserva satisfactoriamente";
            $_SESSION['tipo_mensaje'] = "info";
            $_SESSION['cedula'] = $cedula;
            $_SESSION['reserva'] = $reserva;
            header("Location: fechar.php");
        }

    }


    $fecha_actual = date("Y-m-d\TH:i",time());
    // echo $fecha_actual;
    $fecha_recibo = strtotime($fecha);

    if($fecha_actual > $fecha_recibo)
	{
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <title>Reservar Salon</title>
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="interfazinq.php">AD Conjuntos Residenciales</a>
    <form class="form-inline">
        <a class="navbar-brand" href="#">Soporte</a>
        <a class="navbar-brand" href="../login.php">Iniciar Sesion</a>
    </form>
    </nav>
    <br>

    <h2 class="text-center">Reservar Salon</h2>
    <form action="" method="POST">
    <div class="invisible"><input type="text" class="form-control" name="id" value="<?= $i?>"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h5>Cedula Inquilino</h5>
                <input readonly type="text" name="inquilino" value="<?= $cedula?>" class="form-control">
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Horario de Reserva</h5>
                <select id="lista" name="horario" class="form-control">
                    <option selected>Seleccionar un Horario...</option>
                    <option value="12:00 p.m - 04:00 p.m">12:00 p.m - 04:00 p.m</option>
                    <option value="06:00 p.m - 09:00 p.m">06:00 p.m - 09:00 p.m</option>
                </select>
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Fecha de reserva</h5>
                <select id="lista" name="reserva" class="form-control">
                    <option selected>Seleccionar una fecha de reserva...</option>
                    <option value="09/12/2020">09/12/2020</option>
                    <option value="08/12/2020">08/12/2020</option>
                </select>
                <br>
            </div>
            <div class="col-sm-6">
                <h5>Fecha de entrega de salon...</h5>
                <select id="lista" name="entrega" class="form-control">
                    <option selected>Ver fechas de entrega</option>
                    <option value="11/12/2020">11/12/2020</option>
                    <option value="12/12/2020">12/12/2020</option>
                    <!-- <option value="12/12/2020">12/12/2020</option> -->
                </select>
                <br>
            </div>
        <br>
        </div>
        </div>
    </div>
    <center><input type="submit" name="guardar" class="btn btn-info" value="Reservar Salon"></center>
    </form>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
<?php
	}else
		{?>
		
        <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <title>Reservar Salon</title>
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="interfazinq.php">AD Conjuntos Residenciales</a>
    <form class="form-inline">
        <a class="navbar-brand" href="#">Soporte</a>
        <a class="navbar-brand" href="../login.php">Iniciar Sesion</a>
    </form>
    </nav>
    <br>

    <h2 class="text-center">Lo sentimos... El salon ya esta reservado</h2>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>

	<?php	} ?>


