<?php
include("../db.php");
if(isset($_POST['registrar'])){
    if(strlen($_POST['nombre']) >= 1 &&
       strlen($_POST['apellido']) >= 1 &&
       strlen($_POST['telefono']) >= 1 &&
       strlen($_POST['usuario']) >= 1 &&
       strlen($_POST['contraseña']) >= 1){
           $nombre = trim($_POST['nombre']);
           $apellido = trim($_POST['apellido']);
           $telefono = trim($_POST['telefono']);
           $usuario = trim($_POST['usuario']);
           $contraseña = trim($_POST['contraseña']);
           $consulta = "INSERT INTO administrador(nombre, apellido, telefono, usuario, contraseña) VALUES 
                ('$nombre','$apellido','$telefono','$usuario','$contraseña')";
           $resultado = mysqli_query($conn,$consulta);
           if($resultado){
            echo "¡Te haz registrado satisfactoriamente";

           }else{
               echo "¡Ups, ha ocurrido un error!";
           }

    }else{
        echo "Porfavor completar todos los campos con * ";
    }
}
/*$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$requeridos = strlen($nombre) * strlen($apellido) * strlen($telefono) * strlen($usuario) * strlen($contraseña);
if ($requeridos > 0) {
    $contraseña = md5($contraseña);
    mysql_query("INSERT INTO administrador VALUES('', '$nombre', '$apellido', '$telefono', '$usuario', '$contraseña')");
    echo "Se ha registrado satisfactoriamente";
}else{
    echo "Porfavor llene todos los campos con *";
}*/



?>