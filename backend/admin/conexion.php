<?php

    //Declaración de variables par la conexion con la BD
    $server = 'localhost'; //Servidor
    $bd =  'musica'; //Base de datos
    $user = 'usuariomusica'; //Usuario de acceso a la BD
    $password = 'usuariomusica8'; // Contraseña de acceso a la BD

    //Proceso de conexión a la BD
    $conexion = mysqli_connect($server, $user, $password, $bd);

    //Validación de la conexión con la BD
    if(!$conexion){
        die('Error al conectarse con la Base de Datos,'. mysqli_connect_error());
        exit;
    }//end 
    
    //Procesamiento de la petición a la BD
    // echo '<script>alert("Conexión éxitosa a la BD")</script>';
    mysqli_query($conexion, 'SET NAMES "utf8"');