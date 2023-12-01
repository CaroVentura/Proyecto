<?php
    //Incluir el archivo de conexión
    include 'conexion.php';

    //Para almacenar la información del form registrar
    $nombre = $_POST['nombre'];
    $ap_paterno = $_POST['apellido_paterno'];
    $ap_materno = $_POST['apellido_materno'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];

    //Validar si las variables no estan vacias
    if( empty($nombre) || empty($ap_paterno) || empty($ap_materno) || empty($descripcion)
        ){
        //Se cierra la conexión
		mysqli_close($conexion);
        //Se redirecciona al formulario de insertar
		echo '<script>alert("Error, hay información faltante.");</script>';
		echo '<script> window.location="../pages/artista.php"; </script>';
    }//

    //se declara una variable para referenciar al input que contiene la imagen
	$imagen = $_FILES['imagen']; 

    //Determinamos la variable que almacenara la información de la imagen
    $nombre_archivo = 'NULL';

    //Se genera el sql para insertar
    $query_text = "INSERT INTO artistas values(NULL,'$nombre', '$ap_paterno', '$ap_materno', NULL,'$descripcion');";
    // echo $query_text;

    //Se conecta el sql con la bd
    $query_res = mysqli_query($conexion, $query_text);
        //Se cierra la conexión
        mysqli_close($conexion);
        echo '<script>alert("Usuario registrado correctamente.");</script>';
        echo '<script> window.location="../index.php"; </script>';
    //end else se guardaron los datos de los tennis correctamente

