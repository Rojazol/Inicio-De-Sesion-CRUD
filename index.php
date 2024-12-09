<?php include("conexion.php");?>

<?php include("includes/header.php");?>


<div class="container p-4">

 
        <div class="col-md-4">
    

             <!--BUSCAR TAREA-->
        <div class="card card-body">
            <h3>Buscar alumno</h3>
            <form action="index.php" method="post">

                 <input type="text" name="apellido" class="form-control" placeholder="Apellido"><br>

                    <br>
                 <!--Edite y agregue iconos-->
                <button type="submit" class="btn btn-secondary float-start " name="todos-alumnos">
                <i class='fas fa-users'></i> Todos los alumnos
                </button>
                  <!--Edite y agregue iconos-->
                 <button type="submit" class="btn btn-success float-end " name="buscar-alumno">
                 <i class="fas fa-search"></i> Buscar
                 </button>
            </form>
        </div>
<br>

        </div>
        

        <div class="col-md-8">

    

        <?php
        
        if(isset($_SESSION['message'])) { ?>
    
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  onclick="location.href='index.php'"></button>
            </div>
        
            <?php session_unset(); } ?>


        <!--Guardar tarea-->
               <div class="card card-body">
            <h3>Nuevo alumno</h3>
            <form action="guardar.php" method="post">
                <div class="form-group">
                    <!-- Agregue los campos que faltaban. -->
                    <input type="text" name="dni" class="form-control" placeholder="Ingresar DNI" autofocus><br>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingresar Nombre" autofocus><br>
                    <input type="text" name="apellido" class="form-control" placeholder="Ingresar Apellido" autofocus><br>
                    <input type="text" name="telefono" class="form-control" placeholder="Ingresar Teléfono" autofocus><br>
                    <input type="text" name="calle" class="form-control" placeholder="Ingresar la calle" autofocus><br>
                    <input type="text" name="localidad" class="form-control" placeholder="Ingresar localidad" autofocus><br>
                    <input type="text" name="email" class="form-control" placeholder="Ingresar email" autofocus><br>
                    <!-- Seleccionar carreras. -->
                    <select name="choice">
                    <option value="Tecnicatura superior en administracion con orientacion en marketing">Tecnicatura superior en administracion con orientacion en marketing</option>
                    <option value="Tecnicatura superior en administracion contable">Tecnicatura superior en administracion contable</option>
                    <option value="Tecnicatura superior administracion publica">Tecnicatura superior administracion publica</option>
                    <option value="Tecnicatura superior en guia de turismo">Tecnicatura superior en guia de turismo</option>
                    <option value="Tecnicatura superior en enfermeria">Tecnicatura superior en enfermeria</option>
                    <option value="Tecnicatura superior en analisis, desarrollo y programacion de aplicaciones">Tecnicatura superior en analisis, desarrollo y programacion de aplicaciones</option>
                    </select>
                    </div>
                <br>
                <button type="submit" name="guardar-alumno" class="btn btn-success float-end" >
                <i class="fas fa-save"></i> Guardar
        </button>
                
            </form>

            </div>


	<script type="text/javascript">
	    function confirmar(){
	    return confirm('¿Quiere borrar registro de alumno?'); <!-- Edite este mensaje mensaje -->
	} </script> 
            
     <br>
        <!--Tabla-->
        <h2>Lista de Alumnos</h2> <!-- Edite y agruegue título de la tabla -->
        <table class="table table-responsive table-bordered">
            <br>

            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Calle</th>
                    <th>Localidad</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
              <!--Consulta con el select de todos los datos en tbody-->

            <tbody>

            <?php
                  
                       
                     if (isset($_POST['buscar-alumno'])){
                        
                        $apellido = $_POST['apellido'];
             
    
                        $query = "select * from alumnos where apellido like '%$apellido' ";
                        $resultado = mysqli_query($conn, $query);
    
                        while($row = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                            <td> <?php echo $row['dni']; ?></td>
                            <td> <?php echo $row['nombre']; ?></td>
                            <td> <?php echo $row['apellido']; ?></td>
                            <td> <?php echo $row['telefono']; ?></td>
                            <td> <?php echo $row['calle']; ?></td>
                            <td> <?php echo $row['localidad']; ?></td>
                            <td> <?php echo $row['email']; ?></td>
                            <td>


                            <!-- Botón Ver con ícono -->
                            <a href="ver.php?id=<?php echo $row['id']?>" class="btn btn-success">
                                <i class="fas fa-eye"></i> Ver
                            </a>    

                            <!-- Botón Editar con ícono -->
                            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <!-- Botón Eliminar con ícono -->
                            <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este alumno?');">
                                <i class="fas fa-trash-alt"></i> Eliminar


                            </td>
                        </tr>

                    
                        <?php }

                    } else  { ?>
            
                <?php 

                $query = "select * from alumnos";
                $resultado = mysqli_query ($conn, $query);

                while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td> <?php echo $row['dni']; ?></td>
                        <td> <?php echo $row['nombre']; ?></td>
                        <td> <?php echo $row['apellido']; ?></td>
                        <td> <?php echo $row['telefono']; ?></td>
                        <td> <?php echo $row['calle']; ?></td>
                        <td> <?php echo $row['localidad']; ?></td>
                        <td> <?php echo $row['email']; ?></td>
                        <td>

        
                             
                             <!-- Iconos en los botones -->
                            <a href="ver.php?id=<?php echo $row['id']?>" class="btn btn-success">
                            <i class="fas fa-eye"></i> Ver
                            </a>
                            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                            <i class="fas fa-edit"></i> Editar
                            </a>

                            <?php 
                                echo "<a href='eliminar.php?id=".$row['id']."' onclick='return confirmar()' class='btn btn-danger'>
                                        <i class='fas fa-trash-alt'></i> Eliminar
                                    </a>";
?>

                            
                        </td>
                    </tr>

            <?php } } ?>

            </tbody>
        </table>
        

        </div>

    </div>
    
</div>


   

<?php ("includes/footer.php") ?>

<!--Agregue Footer -->
<footer class="bg-dark text-white mt-5">
    <div class="container">
        <!-- Panel de Footer -->
        <br>
        <div class="row">
            <div class="col-md-6">
                <h5>Sobre Nosotros</h5>
                <p>Somos un instituto dedicada a ofrecer el mejore servicio educativo. ¡Gracias por ser parte!</p>
            </div>
            <div class="col-md-6">
                <h5>Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="privacy-policy.php" class="text-white">Política de Privacidad</a></li>
                    <li><a href="terms.php" class="text-white">Términos y Condiciones</a></li>
                    <li><a href="contact.php" class="text-white">Contacto</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p>&copy; 2024 ISFT Nº93. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- Incluir el enlace de Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

