<?php
    //Incluir el archivo de conexión
    include("../admin/conexion.php");

    //Para almacenar la información del form registrar
    $nombre = $_POST['nombre'];
    $ap_paterno = $_POST['apellido_paterno'];
    $ap_materno = $_POST['apellido_materno'];
    $apodo = $_POST['apodo_art'];
    $descripcion = $_POST['descripcion'];

    //Validar si las variables no estan vacias
    if( empty($nombre) || empty($ap_paterno) || empty($ap_materno) || empty($descripcion) || empty($apodo)
        ){
        //Se cierra la conexión
		mysqli_close($conexion);
        //Se redirecciona al formulario de insertar
		echo '<script>alert("Error, hay información faltante.");</script>';
		echo '<script> window.location="../../pages/artista.php"; </script>';
    }//

    //se declara una variable para referenciar al input que contiene la imagen
    $archivo = $_FILES['imagen']; 

    //Determinamos la variable que almacenara la información de la imagen
    $nombre_archivo = 'NULL';


    if(!empty($archivo['name'])){
        //obtener la extensión del archivo
        $temp = explode(".",$archivo["name"]);
        $extension = end($temp);

        //Verificar la extension del archivo jpg, png, jpeg
        if (($extension != "png") && ($extension != "jpg") && ($extension != "jpeg")) {
            mysqli_close($connect);
            echo    '<script> 
                        alert("Debe subir una archivo con la extensión jpg|jpeg|png"); 
                         <!-- <window.location="../../index.php";-->
                    </script>';
        }//end if extension
        
        //Directorio de las imágenes
        $path = '../../img/artistas/'.$archivo["name"];
        // echo $path;
        //Mover la imagen a una carpeta en especifico
        if(move_uploaded_file($archivo["tmp_name"], $path)) {
            $nombre_archivo = $archivo["name"];
        }//end move

    }
    
    //Se genera el sql para insertar
    $query_text = "INSERT INTO artistas values(NULL,'$nombre', '$ap_paterno', '$ap_materno', '$nombre_archivo','$apodo','$descripcion');";
    echo $query_text;

    //Se conecta el sql con la bd
    $query_res = mysqli_query($conexion, $query_text);
        //Se cierra la conexión
        mysqli_close($conexion);
        echo '<script>alert("Artista registrado correctamente.");</script>';
        echo '<script> window.location="../../index.php"; </script>';
    //end else se guardaron los datos de los tennis correctamente