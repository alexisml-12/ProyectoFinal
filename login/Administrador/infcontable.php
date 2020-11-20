<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
<br>
<!-- Nav pills -->
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="pill" href="#home">Libro Diario</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#menu1">Libro Mayor</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="home">
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
  </div>


  <div class="tab-pane container fade" id="menu1">
    aqui va el libro mayor
  </div>
</div>



    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>