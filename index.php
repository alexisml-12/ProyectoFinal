<?php require "db.php";

if (isset($_SESSION['id'])) {
    $records = $conn->prepare('SELECT usuario, contraseña FROM administrador WHERE id=:id');
    $records->bindParam(':id', $_SESSION['id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Iconos(Font Awesome) -->
    <script src="https://kit.fontawesome.com/80f657c685.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
    <style type="text/css">
    body{
        background: url('includes/fondo5.jpeg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color:rgba(0, 0, 0, 0.5);
        display: block;
        position: relative;
        margin: 0 auto;
        z-index: 0;
    }

    div {
        font-size: 36px;
        color: white;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="">AD Conjuntos Residenciales</a>
        <a class="navbar-brand" href="#">Acerca de nosotros</a>
        <a class="navbar-brand" href="#">Contacto</a>
        <a class="navbar-brand" href="#">Soporte</a>
        <form class="form-inline">
            <a class="navbar-brand" href="login/login.php">Iniciar Sesion</a>
        </form>
    </nav>
<div class="container">
    <div style="background:transparent !important" class="jumbotron">
    <br>
    <br>
        <center><h1 style="color:black;">La mejor manera de administrar tu edificio</h1></center>
        <br>
        <p style="color:black;" class="lead"><b>AD Conjuntos residenciales es una aplicacion desarrollada para brindar el mejor
        servicio para el manejo de informacion de unidades residenciales que tambien cuenta con una interfaz
        para los inquilinos, propietarios y trabajadores de la unidad.</b></p>
        <div class="text-center">
            <!-- <img src="https://www.metrocuadrado.com/noticias/sites/default/files/styles/full_image/public/field/image/68678231_ml.jpg?itok=0ib6VkoJ" class="rounded" alt="" width="960px"> -->
        </div>
    </div>
</div> 


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>