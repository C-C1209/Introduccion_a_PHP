<?php
session_start();
//unset($_SESSION['userData']);//eliminar solo 1 variable de sesion
session_destroy();//mata todas las variables de sesion
header("Location: ../login.php");
?>