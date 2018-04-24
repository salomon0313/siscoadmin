<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION["id_usuario"]))
    {
      header("location: index.html");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MENU</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="text/css" href="imagenes/brote.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body >


<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">ControllerProduction </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="mostrar/tab_sector.php"> Sectores  </a>
      </li>
       <?php
 

  if($_SESSION['tipo_usuario']=="2")
  {

  ?>
  <li class="nav-item">
        <a class="nav-link" href="mostrar/tab_inventas.php"> Ventas</a>
      </li>
<li class="nav-item">
        <a class="nav-link" href="mostrar/tab_clientes.php"> Clientes</a>
      </li>
  <?php
}
  ?>
        <?php

  if($_SESSION['tipo_usuario']=="2")
  {

  ?>
  <li class="nav-item">
        <a class="nav-link" href="mostrar/tab_usu.php"> Usuarios </a>
      </li>
        <?php
}
  ?>
    </ul>
      <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="mostrar/logout.php">&#128100; Cerrar Session </a>
      </li>
    </ul>
  </div>
</nav>

<img src="https://www.meteored.mx/wimages/foto0a2a3d7a742342c90180135cfa696542.png">

</body>
</html>