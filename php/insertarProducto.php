<?php
    include "conexion.php";
    $nombrep = $_POST['nombre'];
    $precio = $_POST['precio'];
    $inventario = $_POST['inventario'];

    $nombre = $_FILES['imagen']['name'];
    $temp = explode(".",$nombre);
    $extension = end($temp);
    $nombreFinal = time().".".$extension;
    
    if($extension == 'jpg' || $extension == 'png'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/productos/".$nombreFinal)){ //tmp_name es el nombre temporal
            
            $conexion ->query("insert into productos (nombre,precio,inventario,imagen)
            values ('$nombrep',$precio,$inventario,'$nombreFinal')") or die($conexion->error);

            header("Location: ../productos.php?success= Se agrego un producto correctamente");
        }else{
            header("Location: ../productos.php?error= ocurrio un error al subir la imagen");
        }
    }else{
        header("Location: ../productos.php?error= tipo de archivo no valido");
    }

    