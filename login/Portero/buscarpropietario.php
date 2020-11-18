<?php 

    require "../../db.php";

    $salida = "";
    $query = "SELECT * FROM propietario WHERE nombre NOT LIKE '' ORDER By cedula LIMIT 25";

    if (isset($_POST['consulta'])) {
        $q = $conn->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM propietario WHERE cedula LIKE '%$q%' OR nombre LIKE '%$q%' OR apellido LIKE '%$q%' OR telefono LIKE '%$q%' OR usuario LIKE '%$q%'";
    }


    $result = $conn->query($query);
    

    if ($result->num_rows>=1) {
        $salida.="<table border=1 class='table table-dark'>
        <thead>
            <tr id='titulo'>
                <td>Cedula</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Telefono</td>
                <td>Usuario</td>
                <td>Acciones</td>
            </tr>
        </thead>
    <tbody>";

    while ($fila=$result->fetch_assoc()) {
        $eliminar = "<a href='eliminarprop.php?cedula=".$fila['cedula']."'class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></a>";
        $editar = "<a href='editarprop.php?cedula=".$fila['cedula']."'class='btn btn-info'><i class='fas fa-marker'></i></a></a>";
            $salida.="<tr>
            <td>".$fila['cedula']."</td>
            <td>".$fila['nombre']."</td>
            <td>".$fila['apellido']."</td>
            <td>".$fila['telefono']."</td>
            <td>".$fila['usuario']."</td>
            <td>".$editar." ".$eliminar."</td>
            </tr>";
        }

        $salida.="</tbody></table>";

    }else {
        $salida.="No se encuentran registros";
    }

    echo $salida;

    $conn->close();

?>