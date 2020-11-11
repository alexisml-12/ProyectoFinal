<?php

require "../../db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM parqueadero WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die('Fallo la consulta');
    }

    $_SESSION['mensaje'] = "Eliminado Correctamente";
    $_SESSION['tipo_mensaje'] = "danger";

    header("Location: consultaparq.php");

}
?>