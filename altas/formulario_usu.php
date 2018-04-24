<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION["id_usuario"]))
    {
      header("location: ../index.html");
    }

?><!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="text/css" href="../imagenes/brote.ico">
	<title>Crear un Usuario </title>
	<link rel="stylesheet" type="text/css" href="modificar/estilos.css">
		<link rel="stylesheet" type="text/css" href="modificar/estilos.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item">
        <a class="nav-link" href="../mostrar/tab_usu.php"> Atrás </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../menu.php"> Menú </a>
      </li>

      </ul>

      </div>
   <a class="navbar-brand" href="#"> <img src="../imagenes/pina.png"> </a>
       
      </nav>

<center>

<form  action="guardar_usu.php" method="POST"  class="form-register">
<body text="blue">
	<h2 class="form-titulo">Crear un Usuario</h2>
	<body >

	<div class="contenedor-inputs">

		<input type="text" REQUIRED pattern="{1,25}" title="..." name="nomb" placeholder="Nombre" value="" class="input-100" >

		<input type="text" REQUIRED pattern="{1,25}" title="..." name="aP" placeholder="Primer Apellido" value="" class="input-100" >

		<input type="text" REQUIRED pattern="{0,25}" title="..." name="aP" placeholder="Segundo Apellido" value="" class="input-100">

		<input type="text" REQUIRED pattern="[0-9_-]{1,10}" title="el numero no debe ser meyor a 10 numeros e ingrese numeros"   name="tel" placeholder=" &#128241; Numero Telefonico" value="" class="input-50">

		<input type="text" REQUIRED pattern="{1,15}" title="..." name="id" placeholder="Nombre de Usuario" value="" class="input-50" >
		<select REQUIRED id="tipo" name="tipo"  class="input-50">
<option value="1"> USUARIO ORDINARIO</option>
<option value="2"> ADMINISTRADOR </option>
</select>

		<input type="password" REQUIRED pattern="{1,15}" title="..." name="pas" placeholder="Contraseña" value="" class="input-100">

		<input type="password" REQUIRED pattern="{1,15}" title="..."  name="pas2" placeholder="Repita su Contraseña" value="" class="input-100">
		<input type="submit" value="Registrar" class="btn-enviar">
	</div>
	
	</form>
</center>




</body>
</html>