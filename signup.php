<?php
    require 'database.php';
    $message = "";
    if(isset($_POST['registro']))
    {
        if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['escuela']))
        {
            if(strlen($_POST['pass'])>8)
            {
                if(preg_match("/[a-zA-Z]/", $_POST['pass']) && preg_match("/[0-9]/", $_POST['pass']))
                {
                    $nomUsuario = $_POST['nombre'];
                    $emailUsuario = $_POST['email'];
                    $passUsuario = $_POST['pass'];
                    $escuelaUsuario = $_POST['escuela'];
                    $res = mysqli_query($conn,"insert into users (nombre, email, pass, escuela) Values ('".$nomUsuario."','".$emailUsuario."','".$passUsuario."','".$escuelaUsuario."')");
                    
                    echo'<script type="text/javascript">
                    alert("Usuario guardado con exito, inicie sesión.");
                    window.location.href="login.html";
                    </script>';
                }
                else
                {
                    echo '<script>alert("La contraseña debe mayusculas, minusculas y al menos un numero.");</script>';
                }
            }
            else
            {
                echo '<script>alert("La contraseña debe tener al menos 8 caracteres.");</script>';
            }
        }
        else
        {
            echo '<script>alert("No puede haber ningun campo vacio");</script>';
        }
    }
?>

<!DOCTYPE html>
<html class="html_login">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>News LoL Login</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=PT+Sans:wght@400;700&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"
            rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body class="body_signup">

        <?php if(!empty($message)): ?>
            <p> <?= $message?> </p>
        <?php endif; ?>

        <h1 class="logo logo__nombre centrar-texto">Registrar usuario.</h1>
            <form class="form_login"  action = "signup.php" method = "POST">
                <div class="form__container_login">
                    <h2 class="form__title">Llena tus datos.</h2>
                    <input name = "nombre" type = "text" placeholder = "Nombre Completo" class="form__input_login">
                    <input name = "email" type = "text" placeholder = "Correo Electronico" class="form__input_login">
                    <input name = "pass" type = "password" placeholder = "Contraseña" class="form__input_login">
                    <input name = "escuela" type = "text" placeholder = "Ingresa tu escuela" class="form__input_login">
                    <input type = "submit" value = " Registrarse " name = "registro" class="form_cta_login">

                    <span> ¿Ya tienes cuenta? <a href = "login.html"> Iniciar sesion.</a></span>
                </div>
            </form>
    </body>
</html>