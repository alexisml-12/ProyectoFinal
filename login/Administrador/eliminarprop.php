<?php

require "../../db.php";

if(isset($_GET['cedula'])){
    $cedula = $_GET['cedula'];
    $query = "DELETE FROM propietario WHERE cedula = $cedula";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die('Fallo la consulta');
    }

    $_SESSION['mensaje'] = "Eliminado Correctamente";
    $_SESSION['tipo_mensaje'] = "danger";

    header("Location: consultapropietario.php");

}

?>