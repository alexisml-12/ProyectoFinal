<?php 

// require "../../db.php";

// if (isset($_POST['registrar'])) {
//     echo "wee";
//     $nombre = trim($_POST['nombre']);
//     $apellido = trim($_POST['apellido']);
//     $telefono = trim($_POST['telefono']);
//     $usuario = trim($_POST['usuario']);
//     $contraseña = trim($_POST['contraseña']);

//     // if (!preg_match('/^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/', $contraseña))
//     // {
//     //     $_SESSION['mensaje'] = "La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.";
//     //     $_SESSION['tipo_mensaje'] = "danger";
//     //     header("Location: registroAdm.php");
//     // }else {
//         $consulta = "INSERT INTO administrador(nombre, apellido, telefono, usuario, contraseña) VALUES 
//         ('$nombre','$apellido','$telefono','$usuario','$contraseña')";
//         $resultado = mysqli_query($conn,$consulta);

//         if($resultado){
//             $_SESSION['mensaje'] = "Usuario Registrado Exitosamente";
//             $_SESSION['tipo_mensaje'] = "info";
//             header("Location: registroAdm.php");
//         }
//     // }
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Registro Administrador</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="../../index.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="../login.php">Iniciar Sesion</a>
  </form>
</nav>

<?php include("registrarAdm.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <br>
            <center><h2>Registrate como Administrador</h2></center>
            <br>
            <form action="registroAdm.php" method="POST">
            <?php if(isset($_SESSION['mensaje'])){ ?>
            <center><div style = "width: 400px;" class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div></center>
            <?php session_unset(); } ?>
                <input class="form-control" type="text" name="nombre" placeholder="*Nombre/s" required>
                <br>
                <input class="form-control" type="text" name="apellido" placeholder="*Apellido/s" required>
                <br>
                <input class="form-control" type="text" name="telefono" placeholder="*Telefono" required>
                <br>
                <input class="form-control" type="text" name="usuario" placeholder="*Elige un nombre de usuario" required>
                <br>
                <input class="form-control" type="password" name="contraseña" placeholder="*Contraseña" required>
                <br>
                <center><input type="submit" class="btn btn-success" name="registrar" value="Registrarme" required></center>
                <br>
            </form>
        </div>    
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>