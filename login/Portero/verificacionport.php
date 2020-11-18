
<?php 

require '../../db.php';

if (isset($_POST['ingresarcod'])) {
  $cod = $_POST['cod'];
  if ($cod == 12345) {
    header("Location: registroPortero.php");
  }else {
    $_SESSION['mensaje'] = 'Ingrese un codigo valido';
    $_SESSION['tipo_mensaje'] = 'danger';
  }
  
}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Registro Administrador</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="../../index.php">AD Conjuntos Residenciales</a>
    </nav>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../../css/login.css" rel="stylesheet">
  </head>
  <br>
  <br>
  <br>  
    <body class="text-center">
        <div class="container">
            <form action="verificacionport.php" method="POST" class="form-signin">
            <?php if(isset($_SESSION['mensaje'])){ ?>
            <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>
                <h1 class="h3 mb-3 font-weight-normal">Ingrese el codigo de acceso</h1>
                <input class="form-control" type="password" name="cod" placeholder="Ingrese el codigo aqui...">
                <br>
                <button class="btn btn-lg btn-success btn-block" name="ingresarcod" type="submit">Ingresar</button>
            </form>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>
</html>