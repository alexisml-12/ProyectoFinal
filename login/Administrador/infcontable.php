<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Información contable</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="logoutadmn.php">Cerrar sesion</a>
  </form>
</nav>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
       <div class="card">
       <div class="card-header" style="background-color: #8D847F;">
       <b>Importar excel</b>
       </div>
       <div class="card-body">
            <div class="row">      
                <div class="col-lg-10">
                    <input type="file" id="txt_archivo" class="form-control" accept=".xlsx">
                </div>

                <div class="col-lg-2">
                    <button class="btn btn-danger">Cargar excel</button>
                </div>  
            </div>  
       </div>
    </div>
  </div>
</div>


      



    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>