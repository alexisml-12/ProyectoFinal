<?php 

    require "../../db.php";

    $salida = "";
    $query = "SELECT * FROM parqueadero WHERE n_espacios NOT LIKE '' ORDER By id LIMIT 25";

    if (isset($_POST['consulta'])) {
        $q = $conn->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM parqueadero WHERE id LIKE '%$q%' OR n_espacios LIKE '%$q%' OR placa_vehiculo LIKE '%$q%'";
    }


    $result = $conn->query($query);
    

    if ($result->num_rows>=1) {
        $salida.="<table border=1 class='table table-dark'>
        <thead>
            <tr id='titulo'>
                <td>ID</td>
                <td>Numero de Espacio</td>
                <td>Placa del Vehiculo</td>
                <td>Acciones</td>
            </tr>
        </thead>
    <tbody>";

    while ($fila=$result->fetch_assoc()) {
        $eliminar = "<a href='eliminarparq.php?id=".$fila['id']."'class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></a>";
        // $editar = "<a href='editarparq.php?id=".$fila['id']."'class='btn btn-info'><i class='fas fa-marker'></i></a></a>";
            $salida.="<tr>
            <td>".$fila['id']."</td>
            <td>".$fila['n_espacios']."</td>
            <td>".$fila['placa_vehiculo']."</td>
            <td>".$eliminar."</td>
            </tr>";
        }

        $salida.="</tbody></table>";

    }else {
        $salida.="No se encuentran registros";
    }

    echo $salida;

    $conn->close();

?>