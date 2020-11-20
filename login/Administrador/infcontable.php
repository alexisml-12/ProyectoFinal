<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Inf contable</title>
    <style type="text/css">
    
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="">AD Conjuntos Residenciales</a>
  <form class="form-inline">
    <a class="navbar-brand" href="">Soporte</a>
    <a class="navbar-brand" href="logoutadmn.php">Cerrar sesion</a>
  </form>
</nav>

<div class="container" style="margin-top: 60px;">

  <ul class="nav nav-tabs">
    <li class="active"><a href="#libdiario" data-toggle="tab">Libro diario</a></li>
    <li><a href="#libmayor" data-toggle="tab">Libro mayor</a></li>
  </ul>

  <div class="tab-content">
  <div class="tab-pane fade" id="libdiario">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header" style="background-color: #8D847F;">
                <b>Importar excel</b>
              </div>
                <div class="card-body">
                  <div class="row">
                      <form action="#" ></form>     
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
  </div>
    <div class="tab-pane fade" id="libmayor"></div>
  </div>
</div>




    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>