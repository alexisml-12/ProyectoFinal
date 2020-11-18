<?php include("../../db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="https://kit.fontawesome.com/80f657c685.js" crossorigin="anonymous"></script>
	<title>Consultar Personal De Trabajo</title>
    <nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="interfazport.php">AD Conjuntos Residenciales</a>
    <form class="form-inline">
        <a class="navbar-brand" href="">Soporte</a>
        <a class="navbar-brand" href="logoutadmn.php">Cerrar sesion</a>
    </form>
</nav>
</head>
<body>

<div class="container">

<section class="principal">
    <br>
    <?php if(isset($_SESSION['mensaje'])){ ?>
            <center><div style = "width: 400px;" class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div></center>
            <?php session_unset(); } ?>
    <br>
	<h1>Buscar Registro del Parqueadero</h1>
    <br>
	<div class="formulario">
		<label for="caja_busqueda">Buscar:</label>
		<input type="text" name="caja_busqueda" id="caja_busqueda"></input>

		
	</div>
    <br>
	<div id="datos"></div>
	
	
</section>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/consultarparq.js"></script>
</body>

</html>