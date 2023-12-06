<?php
//Incluir el archivo de conexión
include("../admin/conexion.php");

//Para almacenar la información del form registrar
$nom_artista = $_POST['nom_artista'];
$cancion = $_POST['cancion'];
$album = $_POST['album'];
$descripcion = $_POST['descripcion'];
$link_s =$_POST['linkS'];
$link_a = $_POST['linkA'];
$idArt = $_POST['nom_artista'];

//Validar si las variables no estan vacias
if( empty($nom_artista) || empty($cancion) || empty($album) || empty($link_a || empty($link_s) || empty($idArt) || empty($descripcion))
){
//Se cierra la conexión
mysqli_close($conexion);
//Se redirecciona al formulario de insertar
echo '<script>alert("Error, hay información faltante.");</script>';
echo '<script> window.location="../../pages/album.php"; </script>';
}//

//se declara una variable para referenciar al input que contiene la imagen
$archivo = $_FILES['imagA'];

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
    $path = '../../img/album/'.$archivo["name"];
    // echo $path;
    //Mover la imagen a una carpeta en especifico
    if(move_uploaded_file($archivo["tmp_name"], $path)) {
        $nombre_archivo = $archivo["name"];
        header('location: ../../index.php');
    }//end move
}
 //Se genera el sql para insertar
 $query_text = "INSERT INTO album values(NULL,'$nom_artista', '$cancion', '$album', '$nombre_archivo','$descripcion','$link_s','$link_a','$idArt');";
 echo $query_text;

 //Se conecta el sql con la bd
 $query_res = mysqli_query($conexion, $query_text);
     //Se cierra la conexión
     mysqli_close($conexion);
     echo '<script>alert("Artista registrado correctamente.");</script>';
     echo '<script> window.location="../../index.php"; </script>';
 //end else se guardaron los datos de los tennis correctamente
