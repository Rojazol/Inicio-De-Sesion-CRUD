<?php
    //session_start();
    include_once('../conexion.php');

    if(isset($_POST['Usuario']) && isset($_POST['Clave'])){ 
         function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Usuario = validate($_POST['Usuario']);
        $Clave = validate($_POST['Clave']);

        if (empty($Usuario)) {
            header("Location: login.php?error=El usuario es requerido");
            exit();
        }elseif (empty($Clave)) {
            header("Location: login.php?error=La clave es requerida");
            exit();
        }else{

            //$Clave = md5($Clave);
             
            $sql = "SELECT * FROM usuarios WHERE username = '$Usuario' AND password = '$Clave'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                    $_SESSION['Usuario'] = $row['username'];
                    $_SESSION['Nombre_completo'] = $row['Nombre_completo'];
                    $_SESSION['Id'] = $row['Id'];
                    header("Location: ../index.php");
                    exit();
            }else{
                header("Location: login.php?error=El usuario o la clave son incorrectos");
                     exit();
            }
            
        }
        
    }else{
        header("Location: ../index.php");
                     exit();
    }