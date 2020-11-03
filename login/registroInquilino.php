<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Registro inquilino</title>
</head>
<body>
<h1>Formulario de registro</h1>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">

        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
            <h2>Registrarse</h2>
            <br>
            <form action="" method="POST">
                <input type="text" name="cedula" placeholder="Cedula">
                <br><br>
                <input type="text" name="nombre" placeholder="Nombre/s">
                <br><br>
                <input type="text" name="apellido" placeholder="Apellido/s">
                <br><br>
                <input type="text" name="telefono" placeholder="Telefono">
                <br><br>
            <select class="custom-select custom-select-sm">
                <option selected>Número inquilinos</option>
                <option value="0">1</option>
                <option value="1">2</option>
                <option value="2">3</option>
                <option value="3">4</option>
                <option value="4">5</option>
            </select>
                <br><br>
                <input type="password" name="contraseña" placeholder="Contraseña">
                <br><br>
                <input type="submit" value="Registrarme">
            </form>
        </div>    
    </div>
</div>





    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>