<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrapt-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../InicioDeSesion/styles.css">
    <title>Registro alumnos Instituto 93</title>
</head>
<body>
    <form action="InicioDeSesion.php" method="POST">
        <h1>INICIAR SESION</h1>
        <hr>
        <?php
        if(isset($_GET['error'])){
            ?>
            <p class="error">
                <?php
                echo $_GET['error']
                ?>

            </p>
            <?php    
            }
        ?>
        <!-- <div class="form__group field">
            <input type="input" class="form__field" placeholder="Usuario" required="">
            <label for="name" class="form__label">Usuario <i class="fa-solid fa-user"></i></label>
        </div>
        <div class="form__group field">
            <input type="input" class="form__field" placeholder="Usuario" required="">
            <label for="name" class="form__label">Contraseña <i class="fa-solid fa-unlock"></i></i></label>
        </div>
        <hr>
        <button class="cssbuttons-io-button"> Iniciar Sesion
        <div class="icon">
            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
        </div>
        </button>
        <a href="Registrarse.php">Registrarse</a> -->
        <div class="wrapper">
                <div class="card-switch">
                    <label class="switch">
                    <input type="checkbox" class="toggle">
                    <span class="slider"></span>
                    <span class="card-side"></span>
                    <div class="flip-card__inner">
                        <div class="flip-card__front">
                            <div class="title">INICIAR SESION</div>
                            <form class="flip-card__form" action="">
                                <input class="flip-card__input" name="Usuario" placeholder="Usuario" type="Usuario">
                                <input class="flip-card__input" name="Contrasena" placeholder="Contrasena" type="Contrasena">
                                <button class="flip-card__btn">Iniciar Sesion</button>
                            </form>
                        </div>
                        <div class="flip-card__back">
                            <div class="title">Registrarse</div>
                            <form class="flip-card__form" action="">
                                <input class="flip-card__input" placeholder="Nombre" type="nombre">
                                <input class="flip-card__input" name="email" placeholder="Email" type="email">
                                <input class="flip-card__input" name="contraseña" placeholder="clave" type="clave">
                                <button class="flip-card__btn">Iniciar Sesion</button>
                                <a href="InicioDeSesion.php">Registrarse</a>
                            </form>
                        </div>
                    </div>
                    </label>
                </div>   
        </div>
    </form>
    
</body>