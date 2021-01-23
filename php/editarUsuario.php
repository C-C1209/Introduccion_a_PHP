<?php
include "./conexion.php";

$id = $_POST['id'];
$nombre=$_POST['nombre'];
$ap = $_POST['ap'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$p2 = $_POST['p2'];

if(trim($pass)=="" && trim($p2)==""){
    $conexion -> query("update usuarios set
    nombre='$nombre',
    apellidos='$ap',
    email='$mail' where id=$id")or die($conexion->error);
    header("Location: ../usuarios.php?success=Actualizado correctamente");
}else{
    if($pass == $p2){
        $pass = sha1($pass);
        $conexion -> query("update usuarios set
        nombre='$nombre',
        apellidos='$ap',
        email='$mail',
        password='$pass' where id=$id")or die($conexion->error);
        header("Location: ../usuarios.php?success=Actualizado correctamente");

    }else{
        header("Location: ../usuarios.php?error= Los comapos no coinciden");
    }
    
}


?>