<?php

require "../../db.php";

if(isset($_GET['id'])){
    $cedula = $_GET['id'];
    $query = "DELETE FROM personal_de_trabajo WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die('Fallo la consulta');
    }

    $_SESSION['mensaje'] = "Eliminado Correctamente";
    $_SESSION['tipo_mensaje'] = "danger";

    header("Location: consultapersonal.php");

}

?>