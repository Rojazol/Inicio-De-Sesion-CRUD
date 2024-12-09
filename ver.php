<?php

include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from alumnos where id=$id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado)==1){
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
    
    ?>

    <?php include("includes/header.php"); ?>

   <div class="container p-4">

   <div class="row">

    <col-md4 mx-auto>
        
        <div class="card card-body ">
            <!--Actualizar con método POST-->
    <form action="">
        <form-group>
        <input type="text" name="dni" value="<?php echo $dni; ?>" class="form-control" placeholder="Actualizar DNI"><br>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar nombre"><br>
            <input type="text" name="apellido" value="<?php echo $apellido; ?>" class="form-control" placeholder="Actualizar apellido"><br>
            <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Actualizar teléfono"><br>
            <input type="text" name="calle" value="<?php echo $calle; ?>" class="form-control" placeholder="Actualizar calle"><br>
            <input type="text" name="localidad" value="<?php echo $localidad; ?>" class="form-control" placeholder="Actualizar localidad"><br>
            <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Actualizar email"><br>
        </form-group>
        <br>
   <a href="index.php" class="btn btn-success">
    <i class="fas fa-arrow-left"></i> Volver
</a>

    </form>
        </div>    

        </col-md>

   </div>

   </div>

    <?php include("includes/footer.php"); ?>
