<?php

// session_start();
require "../../db.php"; 

$usuario = $_SESSION['username'];

if (!isset($usuario)) {
  header("Location: ../../index.php");
}

$query = "SELECT * FROM `inquilino` WHERE usuario='$usuario'";
$result = mysqli_query($conn, $query);

if ($fila = mysqli_fetch_array($result)) {
  $cedula = $fila['cedula'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Inquilinos</title>
    <style type="text/css">
        a:link, a:visited, a:active {
            text-decoration:none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="logoutinq.php">Cerrar sesion</a>
  </form>
</nav>


<div class="container">
  <br>
  <center><h4>Bienvenido <?php echo $usuario; ?></h4></center>
  <br>
  <center><h2>Inquilinos</h2></center>
  <br>

  <br>
<ul style="float:left;">
     <li class="submenu"><a style="color:#1C2833;" href="infoper.php?cedula=<?php echo $cedula?>"><h5>Informacion personal<span class="icon-down-open"></h5></span>

        </li>
      </ul>
      <ul style="float:right;">
     <li style="margin-rigth:-30px;"><a style="color:#1C2833;" href="pagararren.php"><h5>Pagar arrendamiento⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀<span class="icon-down-open"></h5></a></span>
     </li>
    </ul>
</div>
<br><br><br><br><br><br>
<div class="container">
<ul style="float:left;">
     <li class="submenu"><h5>Ver apartamentos<span class="icon-down-open"></h5></span>
          <ul>
            <li>
              <a href="apteventa.php"><h6>A la venta</h6></a>
            </li>
            <li>
              <a href="aptearrendar.php"><h6>Para alquilar</h6></a>
            </li>
          </ul>
        </li>
      </ul>
    <ul style="float:right;">
      <li>
      <a style="color:#1C2833;" href="consultaparq.php"><h5>Reservar Salón⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀<span class="icon-down-open"></h5></a></span>
      </li>
    </ul>
</div>


</body>
</html>