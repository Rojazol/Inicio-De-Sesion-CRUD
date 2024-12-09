<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM alumnos WHERE id=$id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $dni = $row['dni'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $telefono = $row['telefono'];
        $calle = $row['calle'];
        $localidad = $row['localidad'];
        $email = $row['email'];
    }
}

if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $calle = $_POST['calle'];
    $localidad = $_POST['localidad'];
    $email = $_POST['email'];

    // Actualizar los datos
    $query = "UPDATE alumnos SET dni='$dni', nombre='$nombre', apellido='$apellido', telefono='$telefono', calle='$calle', localidad='$localidad', email='$email' WHERE id=$id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = "El registro se actualizó correctamente";


}

?>

<?php include("includes/header.php"); ?>

        <!--Mensaje de tarea-->

        <?php
        
        if(isset($_SESSION['message'])) { ?>
    
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  onclick="location.href='index.php'"></button>
            </div>
        
            <?php session_unset(); } ?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <!--Formulario de actualización-->
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="dni" value="<?php echo $dni; ?>" class="form-control" placeholder="Actualizar DNI"><br>
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar nombre"><br>
                        <input type="text" name="apellido" value="<?php echo $apellido; ?>" class="form-control" placeholder="Actualizar apellido"><br>
                        <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Actualizar teléfono"><br>
                        <input type="text" name="calle" value="<?php echo $calle; ?>" class="form-control" placeholder="Actualizar calle"><br>
                        <input type="text" name="localidad" value="<?php echo $localidad; ?>" class="form-control" placeholder="Actualizar localidad"><br>
                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Actualizar email"><br>

                        <!-- Selección de carrera -->
                        <select name="choice" class="form-control">
                        <option value="Tecnicatura superior en administracion con orientacion en marketing">Tecnicatura superior en administración con orientación en marketing</option>
                        <option value="Tecnicatura superior en administracion contable">Tecnicatura superior en administración contable</option>
                        <option value="Tecnicatura superior administracion publica">Tecnicatura superior administración pública</option>
                        <option value="Tecnicatura superior en guia de turismo">Tecnicatura superior en guía de turismo</option>
                        <option value="Tecnicatura superior en enfermería">Tecnicatura superior en enfermería</option>
                        <option value="Tecnicatura superior en analisis, desarrollo y programacion de aplicaciones">Tecnicatura superior en análisis, desarrollo y programación de aplicaciones</option>
                        </select>
                        <br>

                        <!-- Botones alineados -->
                        <div class="d-flex justify-content-between">
                            <!-- Botón Volver alineado a la izquierda con el icono-->
                            <button type="button" onclick="volver()" class="btn btn-secondary float-end" >
                            <i class="fas fa-arrow-left"></i> Volver
                            </button>
                           
                            <!-- Botón Actualizar alineado a la derecha con el icono-->
                            <button type="submit" name="actualizar" class="btn btn-primary float-end">
                            <i class="fas fa-sync-alt"></i> Actualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function volver() {
        // Redirige a la página principal (index.php)
        window.location.href = "index.php";
    }
</script>

<script>
    function actualizar() {
        location.reload(); // Recarga la página
       
    }
</script>


<script type="text/javascript">
   
</script>

<?php include("includes/footer.php"); ?>
