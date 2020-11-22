<?php


require "../../db.php"; 

$usuario = $_SESSION['username'];

if (!isset($usuario)) {
  header("Location: ../../index.php");
}

$query = "SELECT * FROM `portero` WHERE usuario='$usuario' LIMIT 0, 25";
$result = mysqli_query($conn, $query);

if ($fila = mysqli_fetch_array($result)) {
  $id = $fila['id'];
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
  <a class="navbar-brand" href="">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="logoutadmn.php">Cerrar sesion</a>
  </form>
</nav>

<div class="container">
  <br>
  <center><h4>Bienvenido <?php echo $usuario; ?></h4></center>
  <br>
  <center><h2>¿Que desea hacer?</h2></center>
  <br>

<br>
<ul style="float:left;">
     <li class="submenu"><h5>Consultar informacion del inquilino y/o propietarios<span class="icon-down-open"></h5></span>
          <ul>
            <li>
              <a href="consultainquilino.php"><h6>Consultar informacion de los inquilinos</h6></a>
            </li>
            <li>
              <a href="consultapropietario.php"><h6>Consultar informacion de los propietarios</h6></a>
            </li>
          </ul>
        </li>
      </ul>
      <ul style="float:right;">
     <li><a style="color:#1C2833;" href="consultapersonal.php"><h5>Consultar informacion del personal de trabajo⠀⠀<span class="icon-down-open"></h5></a></span>
     </li>
    </ul>
</div>
<br><br><br><br><br><br>
<div class="container">
<ul style="float:left;">
    <li>
      <a style="color:#1C2833;" href="minuta.php?id=<?php echo $fila['id']?>"><h5>Minuta<span class="icon-down-open"></h5></a></span>   
      <ul>
            <li>
              <a href="registromin.php?id=<?php echo $id?>"><h6>Ingresar al registro de minutas</h6></a>
            </li>
          </ul>
    </li>
    </ul>
</div>
<br><br><br><br><br>
<div class="container">
<ul style="float:left;">
     <li class="submenu"><a style="color:#1C2833;" href="consultaparq.php"><h5>Consultar del parqueadero<span class="icon-down-open"></h5></a></span></span>
        </li>
      </ul>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>