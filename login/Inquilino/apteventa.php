<?php

require "../../db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Apartamentos a la venta</title>
    <style type="text/css">
    
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="interfazinq.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="logoutadmn.php">Cerrar sesion</a>
  </form>
</nav>
<br>
<br>
<div class="container">
<h4 class="text-center">Apartamentos a la venta</h4>
<br>
    <div class="row">
    <!--  -->
    <?php 
        $query = "SELECT * FROM `apartamentos` WHERE estado='venta' LIMIT 0, 25";
        $result = mysqli_query($conn, $query);

        while($fila = mysqli_fetch_array($result)){?>
        <div class="col-sm-6">
            <div class="card">
            <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($fila["imagen"]).'" alt="Card image cap" />';?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $fila['titulo'];?></h5>
                <p class="card-text"><?php echo $fila['descripcion'];?></p>
                <a href="verinfoapt.php?id=<?php echo $fila['id']?>" class="btn btn-primary">Ver mas informacion</a>
            </div>
            </div>
            <br>
        </div>
        <?php } ?>
        <!--  -->
    </div>
</div>
</body>
</html>