<?php
session_start();
unset($_SESSION["id_usuario"]); 
  unset($_SESSION["tipo_usuario"]);
  session_destroy();
header("location:../index.html")
  
?>