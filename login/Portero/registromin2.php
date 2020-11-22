<?php 

    include("../../db.php");

    $usuario = $_SESSION['username'];

    if (!isset($usuario)) {
      header("Location: ../../index.php");
    }

    // if(isset($_GET['id'])){
    //     // $id = $_GET['id'];
    //     // echo "hola";
    // }

    $salida = "";
    $query = "SELECT * FROM minuta WHERE id NOT LIKE '' ORDER By id desc LIMIT 25";

    if (isset($_POST['consulta'])) {
        $q = $conn->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM minuta WHERE id LIKE '%$q%' OR ingreso_vehiculo LIKE '%$q%' OR salida_vehiculo LIKE '%$q%' OR 
        ingreso_persona LIKE '%$q%' OR salida_persona LIKE '%$q%' OR inventario LIKE '%$q%' OR notas LIKE '%$q%' OR portero LIKE '%$q%'";
    }


    $result = $conn->query($query);
    

    if ($result->num_rows>=1) {
        $salida.="<table border=1 class='table table-dark'>
        <thead>
            <tr id='titulo'>
                <td>ID</td>
                <td>Ingreso vehiculo</td>
                <td>Salida vehiculo</td>
                <td>Ingreso persona</td>
                <td>Salida persona</td>
                <td>Inventario</td>
                <td>Notas</td>
                <td>Portero</td>
            </tr>
        </thead>
    <tbody>";

    while ($fila=$result->fetch_assoc()) {
            // $eliminar = "<a href='eliminarinq.php?cedula=".$fila['cedula']."'class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></a>";
            $editar = "<a href='editarmin.php?id=".$fila['id']."'class='btn btn-info'><i class='fas fa-marker'></i></a></a>";
            $salida.="<tr>
            <td>".$fila['id']."</td>
            <td>".$fila['ingreso_vehiculo']."</td>
            <td>".$fila['salida_vehiculo']."</td>
            <td>".$fila['ingreso_persona']."</td>
            <td>".$fila['salida_persona']."</td>
            <td>".$fila['inventario']."</td>
            <td>".$fila['notas']."</td>
            <td>".$fila['portero']."</td>
            <td>".$editar."</td>
            </tr>";
        }

        $salida.="</tbody></table>";

    }else {
        $salida.="No se encuentran registros";
    }

    echo $salida;

    // $conn->close();

?>