<?php
    define('DB_CHARSET','utf-8');
    define('DB_HOST','localhost');
    define('DB_PASS','');
    define('DB_USER','root');
    define('DB_NAME','login');

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    //Verificar conexion
    if(!$conn)
    {
        die("Conexion fallida: ".mysqli_connect_error());
    }
?>