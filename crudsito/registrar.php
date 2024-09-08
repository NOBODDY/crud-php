<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtIdentificacion"]) || empty($_POST["txtServicio"]) || empty($_POST["txtEstado"]) || empty($_POST["txtFecha"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $identificacion = $_POST["txtIdentificacion"];
    $servicio = $_POST["txtServicio"];
    $estado = $_POST["txtEstado"];
    $fecha = $_POST["txtFecha"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(nombre,identificacion,servicio,estado,fecha) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$identificacion,$servicio,$estado,$fecha]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>