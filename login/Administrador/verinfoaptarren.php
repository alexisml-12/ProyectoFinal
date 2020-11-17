<?php 

  require "../../db.php";

  $usuario = $_SESSION['username'];

  if (!isset($usuario)) {
    header("Location: ../../index.php");
  }

  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $query = "SELECT * FROM apartamentos WHERE id=$id";
      // $query = "SELECT a.id, a.titulo, a.cuartos, a.baños, a.metros_cuadrados, a.descripcion, a.imagen, 
      // a.estado, p.telefono FROM apartamentos a, propietario p WHERE a.propietario=p.cedula AND a.id=$id";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) == 1) { //mysqli_num_rows PARA COMPROBAR CUANTA FILAS TIEN EL RESULTADO
          $fila = mysqli_fetch_array($result);
          $imagen = $fila['imagen'];
          $titulo = $fila['titulo'];
          $cuartos = $fila['cuartos'];
          $baño = $fila['baños'];
          $m2 = $fila['metros_cuadrados'];
          $descripcion = $fila['descripcion'];
          $propietario = $fila['propietario'];
          $inquilino = $fila['inquilino'];
          

          if (isset($propietario)) {
            $query2 = "SELECT * FROM propietario WHERE cedula=$propietario";
            $result2 = mysqli_query($conn, $query2);
            if(mysqli_num_rows($result2) == 1) { //mysqli_num_rows PARA COMPROBAR CUANTA FILAS TIEN EL RESULTADO
              $fila2 = mysqli_fetch_array($result2);
              $tel = $fila2['telefono'];
              $nom = $fila2['nombre'];
              $ap = $fila2['apellido'];
            }
          }
          if (isset($inquilino)) {
            $query3 = "SELECT * FROM inquilino WHERE cedula=$inquilino";
            $result3 = mysqli_query($conn, $query3);
            if(mysqli_num_rows($result3) == 1) { //mysqli_num_rows PARA COMPROBAR CUANTA FILAS TIEN EL RESULTADO
              $fila3 = mysqli_fetch_array($result3);
              $nomb = $fila3['nombre'];
              $ape = $fila3['apellido'];
            }
          }
      } 
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Ver informacion</title>
    <style type="text/css">
    
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="interfazAdm.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="logoutadmn.php">Cerrar sesion</a>
  </form>
</nav>
<br>
<br>
<div class="container">
  <div class="float-left">
    <div class="card" style="width: 29rem; height: 25rem;">
    <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($fila["imagen"]).'" height="400" alt="Card image cap" />';?>
    </div>
  </div>

  <form>
    <div class="form-group row">
      <h6 class="col-sm-2 col-form-label">Apartamento:</h6>
      <div class="col-sm-9">
        <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo $titulo?>">
      </div>
    </div>
    <div class="form-group row">
      <h6 class="col-sm-2 col-form-label">Inquilino:</h6>
      <div class="col-sm-9">
        <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo $nomb." ".$ape?>">
      </div>
      </div>
    <div class="form-group row">
      <h6 class="col-sm-2 col-form-label">Cuartos:</h6>
      <div class="col-sm-9">
        <input type="text" readonly class="form-control" value="<?php echo $cuartos?>">
      </div>
    </div>
    <div class="form-group row">
      <h6 class="col-sm-2 col-form-label">Baños:</h6>
      <div class="col-sm-9">
        <input type="text" readonly class="form-control" value="<?php echo $baño?>">
      </div>
    </div>
    <div class="form-group row">
      <h6 class="col-sm-2 col-form-label">Metros cuadrados:</h6>
      <div class="col-sm-9">
        <input type="text" readonly class="form-control" value="<?php echo $m2?>">
      </div>
    </div>
    <div class="form-group row">
      <h6 class="col-sm-2 col-form-label">Descripcion:</h6>
      <div class="col-sm-9">
      <input type="text" readonly class="form-control" value="<?php echo $descripcion?>">
      <!-- <br>
      <center><a href="verinfoapt.php?id=" class="btn btn-primary">Ver informacion del propietario</a></center> -->
      </div>
    </div>
    <div class="form-group row">
      <h6 class="col-sm-2 col-form-label">Propietario:</h6>
      <div class="col-sm-9">
        <input type="text" readonly class="form-control" value="<?php echo $nom." ".$ap?>">
        <br>
        <center><a href="consultainquilino.php" class="btn btn-primary">Ver informacion del inquilino</a></center> 
      </div>
    </div>
    
  </form>
</div>

</body>
</html>