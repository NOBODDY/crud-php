<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from persona where codigo = ?;");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $persona->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">identificacion: </label>
                        <input type="number" class="form-control" name="txtIdentificacion" autofocus required
                        value="<?php echo $persona->identificacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">servicio: </label>
                        <input type="text" class="form-control" name="txtServicio" autofocus required
                        value="<?php echo $persona->servicio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">estado: </label>
                        <input type="text" class="form-control" name="txtEstado" autofocus required
                        value="<?php echo $persona->estado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">fecha: </label>
                        <input type="text" class="form-control" name="txtFecha" autofocus required
                        value="<?php echo $persona->fecha; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>