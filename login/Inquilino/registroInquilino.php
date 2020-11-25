<?php

    require '../../db.php';

    if(isset($_POST['registrarse'])){
        $cedula = trim($_POST['cedula']);
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $telefono = trim($_POST['telefono']);
        $n_inquilinos = trim($_POST['inquilinos']);
        $usuario = trim($_POST['usuario']);
        $contraseña = trim($_POST['contraseña']);
        $apte = trim($_POST['apartamento']);

        $consulta2 = "SELECT * FROM inquilino WHERE apartamento='$apte'";
        $resultado2 = mysqli_query($conn,$consulta2);
    
        if($resultado2){
            $_SESSION['mensaje'] = "Ya existe un inquilino con este apartamento";
            $_SESSION['tipo_mensaje'] = "danger";
        }elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z-0-9])[a-zA-Z-0-9]{6,16}$/', $contraseña))
            {
                // echo "szs";
                $_SESSION['mensaje'] = "La contraseña debe tener al entre 6 y 16 caracteres
                <br>
                Debe contener un caracter numerico";
                $_SESSION['tipo_mensaje'] = "danger";
                // header("Location: registroAdm.php");
            }else{
                $consulta = "INSERT INTO inquilino(cedula, nombre, apellido, telefono, usuario, contraseña, apartamento) VALUES 
                ('$cedula','$nombre','$apellido','$telefono','$usuario','$contraseña', '$apte')";
                $resultado = mysqli_query($conn,$consulta);
                if($resultado){
                    $_SESSION['mensaje'] = "Se ha registrado exitosamente";
                    $_SESSION['tipo_mensaje'] = "info";
                    // header("Location:../login.php");
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
    <title>Registro inquilino</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="../../index.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="#">Soporte</a>
    <a class="navbar-brand" href="../login.php">Iniciar Sesion</a>
  </form>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <br>
            <center><h2>Registrate como Inquilino</h2></center>
            <br>
            <form action="registroinquilino.php" method="POST">
            <?php if(isset($_SESSION['mensaje'])){ ?>
            <center><div style = "width: 400px;" class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div></center>
            <?php  } ?>
                <input class="form-control" type="text" name="cedula" placeholder="*Cedula" required>
                <br>
                <input class="form-control" type="text" name="nombre" placeholder="*Nombre/s" required>
                <br>
                <input class="form-control" type="text" name="apellido" placeholder="*Apellido/s" required>
                <br>
                <input class="form-control" type="text" name="telefono" placeholder="*Telefono" required>
                <br>
                <select class="form-control" name="inquilinos" id="inquilinos" required>
                    <option selected>*Número inquilinos</option>
                    <option value="0">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                </select>
                <br>
                <input class="form-control" type="text" name="usuario" placeholder="*Usuario" required>
                <br>
                <input class="form-control" type="password" name="contraseña" placeholder="*Contraseña" required>
                <br>
                <input class="form-control" type="text" name="apartamento" placeholder="*Ingrese el ID del apartamento que se le asigno" required>
                <br>
                <center><input type="submit" class="btn btn-info" name="registrarse" value="Registrarme"></center>
                <br>
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