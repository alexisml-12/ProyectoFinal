<?php
include("../../db.php");
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
               ?>
            <div class="alert alert-primary" role="alert">
             <?php echo "¡Se ha registrado satisfactoriamente!"?>
            </div>
            <?php
           }else{
            ?>
             <div class="alert alert-danger" role="alert">
             <?php echo "¡Ups!, algo ha ocurrido"?>
             </div>
             <?php
           }

    }else{
        ?>
        <div class="alert alert-danger" role="alert">
        <?php echo "Ingrese todos los campos con * "?>
        </div>
        <?php
    }
}
?>