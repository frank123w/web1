<?php
$conexion = null;
$servidor = 'localhost'; //servidor local
$bd='registro'; //base de datos
$user ='root'; //usuario de mysql
$pass = ''; //contraseña de mysql

try{
    $conexion = new PDO('mysql:host='.$servidor.';dbname='.$bd, $user, $pass);
    echo"conexion extiosa";
}catch (PDOException $e){
    echo"Error de conexion!";
    exit;
}
return $conexion;
?>