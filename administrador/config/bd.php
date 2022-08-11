<?php
  $host="localhost";
  $bd="tapiceria";
  $usuario="root";
  $password="";

  try{
    $conexion = new PDO("mysql:host=$host;dbname=$bd",$usuario,$password);
    // if($conexion){echo "Conectado.... a sistema <br>";}
    // echo "Base ".$bd."<br>";
    // echo "Usuario ".$usuario."<br>";
    // echo "host ".$host."<br>";
  }
  catch(Exception $ex){
    echo $ex->getMessage();
  }
?>
