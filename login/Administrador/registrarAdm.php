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
           if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z-0-9])[a-zA-Z-0-9]{6,16}$/', $contraseña))
            {
                // echo "szs";
                $_SESSION['mensaje'] = "La contraseña debe tener al entre 6 y 16 caracteres
                <br>
                Debe contener un caracter numerico";
                $_SESSION['tipo_mensaje'] = "danger";
                // header("Location: registroAdm.php");
            }else{
           $consulta = "INSERT INTO administrador(nombre, apellido, telefono, usuario, contraseña) VALUES 
                ('$nombre','$apellido','$telefono','$usuario','$contraseña')";
           $resultado = mysqli_query($conn,$consulta);
           if($resultado){
            $_SESSION['mensaje'] = "Se ha registrado exitosamente";
            $_SESSION['tipo_mensaje'] = "info";
            // header("Location:../login.php");
           }else{
            ?>
             <div class="alert alert-danger" role="alert">
             <?php echo "¡Ups!, algo ha ocurrido"?>
             </div>
             <?php
           }
        }
    }
    
}
?>