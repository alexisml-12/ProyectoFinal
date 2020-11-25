<?php
include("../../db.php");


// session_start();

$usuario = $_SESSION['username'];

if (!isset($usuario)) {
header("Location: ../../index.php");

}



if(isset($_GET['cedula'])){
    $cedula = $_GET['cedula'];
    $query = "SELECT * FROM inquilino WHERE cedula=$cedula";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) { //mysqli_num_rows PARA COMPROBAR CUANTA FILAS TIEN EL RESULTADO
        $fila = mysqli_fetch_array($result);
        $cedula = $fila['cedula'];
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $telefono = $fila['telefono'];
        $inquilinos = $fila['n_inquilinos'];
        $usuario = $fila['usuario'];
        $clave = $fila['contraseña'];
        $apte = $fila['apartamento'];
    } 
}

if(isset($_POST['actualizar'])){
    $usuario = $_SESSION['username'];
    $cedula = $_GET['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $inquilinos = $_POST['inquilinos'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['contraseña'];
    $apte = $_POST['apartamento'];

    $query = "UPDATE inquilino SET nombre='$nombre', apellido='$apellido', telefono='$telefono', 
    n_inquilinos='$inquilinos', usuario='$usuario', contraseña='$clave', apartamento='$apte' WHERE cedula=$cedula";
    mysqli_query($conn, $query);

    $_SESSION['mensaje'] = "Mensaje actualizado satisfactoriamente";
    $_SESSION['tipo_mensaje'] = "info";
    // header("Location: interfazinq.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="https://kit.fontawesome.com/80f657c685.js" crossorigin="anonymous"></script>
    <title>Editar inquilino</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="../Inquilino/interfazinq.php">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="#">Soporte</a>
    <a class="navbar-brand" href="logoutadmn.php">Cerrar Sesion</a>
  </form>
</nav>
<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>


<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <br>
            <center><h2>Informacion personal</h2></center>
            <br>
            <form action="editarinq.php?cedula=<?php echo $cedula?>" method="POST">
            <?php if(isset($_SESSION['mensaje'])){ ?>
            <center><div style = "width: 400px;" class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div></center>
            <?php } ?>
                <h6>Cedula:</h6>
                <input class="form-control" type="text" value="<?php echo $cedula?>" name="cedula" placeholder="*Cedula" readonly>
                <br>
                <h6>Nombre:</h6>
                <input class="form-control" type="text" value="<?php echo $nombre?>" name="nombre" placeholder="*Nombre/s" required>
                <br>
                <h6>Apellidos</h6>
                <input class="form-control" type="text" value="<?php echo $apellido?>" name="apellido" placeholder="*Apellido/s" required>
                <br>
                <h6>Telefono</h6>
                <input class="form-control" type="text" value="<?php echo $telefono?>" name="telefono" placeholder="*Telefono" required>
                <br>
                <h6>Numero de inquilinos</h6>
                <select class="form-control" name="inquilinos" id="inquilinos" >
                    <option selected><?php echo $inquilinos; ?></option>
                    <option value="0">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                </select>
                <br>
                <h6>Usuario:</h6>
                <input class="form-control" type="text" value="<?php echo $usuario?>" name="usuario" placeholder="*Usuario" required>
                <br>
                <h6>Contraseña:</h6>
                <div class="input-group">
                <input ID="txtPassword" type="Password" name="contraseña" value="<?php echo $clave?>" Class="form-control" required>
                <div class="input-group-append">
                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> <i class=''></i></button>
                    </div>
                </div>
                <br>
                <h6>ID Apartamento:</h6>
                <input class="form-control" type="text" value="<?php echo $apte?>" name="apartamento" placeholder="*Ingrese el ID del apartamento que se le asigno" readonly>
                <br>
                <center><input type="submit" class="btn btn-success" name="actualizar" value="Actualizar Datos">
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