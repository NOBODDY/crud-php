<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $identificacion = $_POST['txtIdentificacion'];
    $servicio = $_POST['txtServicio'];
    $estado = $_POST['txtEstado'];
    $fecha = $_POST['txtFecha'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, identificacion = ?, servicio = ?, estado = ?, fecha = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $identificacion, $servicio,$estado, $fecha, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>