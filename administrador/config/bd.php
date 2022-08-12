<?php
  $host="localhost";
  $bd="tapiceria";
  $usuario="root";
  $password="";

  try{
    $conexion = new PDO("mysql:host=$host;dbname=$bd",$usuario,$password);
  }
  catch(Exception $ex){
    echo $ex->getMessage();
  }
?>
