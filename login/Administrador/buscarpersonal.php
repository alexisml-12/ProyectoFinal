<?php 

    require "../../db.php";

    $salida = "";
    $query = "SELECT * FROM personal_de_trabajo WHERE nombre NOT LIKE '' ORDER By id LIMIT 25";

    if (isset($_POST['consulta'])) {
        $q = $conn->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM personal_de_trabajo WHERE id LIKE '%$q%' OR nombre LIKE '%$q%' OR apellido LIKE '%$q%' OR cargo LIKE '%$q%'";
    }


    $result = $conn->query($query);
    

    if ($result->num_rows>=1) {
        $salida.="<table border=1 class='table table-dark'>
        <thead>
            <tr id='titulo'>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Cargo</td>
                <td>Acciones</td>
            </tr>
        </thead>
    <tbody>";

    while ($fila=$result->fetch_assoc()) {
        $eliminar = "<a href='eliminarpersonal.php?id=".$fila['id']."'class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></a>";
        $editar = "<a href='editarpersonal.php?id=".$fila['id']."'class='btn btn-info'><i class='fas fa-marker'></i></a></a>";
            $salida.="<tr>
            <td>".$fila['id']."</td>
            <td>".$fila['nombre']."</td>
            <td>".$fila['apellido']."</td>
            <td>".$fila['cargo']."</td>
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