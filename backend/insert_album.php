<?php
    //Incluir el archivo de conexión
    include 'conexion.php';

    //Para almacenar la información del form registrar
    $nombre_album = $_POST['nombre_album'];
    $nom_cancion = $_POST['nom_cancion'];
    $imagen = $_POST['imagen'];
    $artista = $_POST['artista'];

    //Validar si las variables no estan vacias
    if( empty($nombre_album) || empty($nom_cancion) || empty($artista)
        ){
        //Se cierra la conexión
		mysqli_close($conexion);
        //Se redirecciona al formulario de insertar
		echo '<script>alert("Error, hay información faltante.");</script>';
		echo '<script> window.location="../pages/album.php"; </script>';
    }//

    //se declara una variable para referenciar al input que contiene la imagen
	$imagen = $_FILES['imagen']; 

    //Determinamos la variable que almacenara la información de la imagen
    $nombre_archivo = 'NULL';

    //Se genera el sql para insertar
    $query_text = "INSERT INTO album values(NULL,'$nom_cancion', '$nombre_album', NULL,'$artista');";
    // echo $query_text;

    //Se conecta el sql con la bd
    $query_res = mysqli_query($conexion, $query_text);
        //Se cierra la conexión
        mysqli_close($conexion);
        echo '<script>alert("Album registrado correctamente.");</script>';
        echo '<script> window.location="../index.php"; </script>';
    //end else se guardaron los datos de los tennis correctamente

