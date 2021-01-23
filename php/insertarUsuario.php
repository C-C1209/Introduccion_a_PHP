<?php
//insertar cosas de busqueda GET
//insertar cosas sensibles POST
include "./conexion.php";

$nombre = $_POST['nombre'];
$ap = $_POST['ap'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$p2 = $_POST['p2'];

if($pass != $p2){
    echo "el password es diferente";
    header("Location: ../usuarios.php?error= Los campos no coinciden");
}else{
    $pass=sha1($pass);
    $conexion -> query("insert into usuarios (nombre, apellidos, email, password, img_perfil)
    values ('$nombre', '$ap', '$mail', '$pass','default.jpg')") or die($conexion -> error);
    header("Location: ../usuarios.php");
}

?>