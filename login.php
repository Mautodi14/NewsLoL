<?php
require 'database.php';
    session_start();
    $message = "";

    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $emailUsuario = $_POST['email'];
        $passUsuario = $_POST['password'];
        $_SESSION['email'] = $emailUsuario;
        $res = mysqli_query($conn,"SELECT id, email, pass FROM users WHERE email = '$emailUsuario' and pass = '$passUsuario'");
        $filas=mysqli_num_rows($res); 

        if($filas){
            header("Location:index.html");
        }
        else {
            
            echo'<script type="text/javascript">
            alert("Usuario o contraseña incorrecto, porfavor escriba nuevamente los datos.");
            window.location.href="login.html";
            </script>';
            
        }
    }else{
        echo '<script>alert("No puede haber ningun campo vacio");
        window.location.href="login.html";</script>';
    }
?>



