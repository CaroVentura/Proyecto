<?php
//Incluir el archivo de conexión
include("../admin/conexion.php");

//Para almacenar la información del form registrar
$idAlbum = $_POST['IdAlbum'];
$nom_artista = $_POST['nom_artista'];
$cancion = $_POST['cancion'];
$album = $_POST['album'];
$descripcion = $_POST['descripcion'];
$link_s =$_POST['linkS'];
$link_a = $_POST['linkA'];
$IdArt = $_POST['nom_artista'];

//Validar si las variables no estan vacias
if( empty($nom_artista) || empty($cancion) || empty($album) || empty($link_a || empty($link_s) || empty($idArt) || empty($descripcion))
){
//Se cierra la conexión
mysqli_close($conexion);
//Se redirecciona al formulario de insertar
echo '<script>alert("Error, hay información faltante.");</script>';
echo '<script> window.location="../../pages/album.php"; </script>';
}//

//Recibe el archivo
$archivo = $_FILES['imagA'];

//Variable del nombre temporal de la imagen
$nombre_archivo ='NULL';

if(!empty($archivo['name'])){
    //obtener la extensión del archivo
    $temp = explode(".",$archivo["name"]);
    $extension = end($temp);

    //Verificar la extension del archivo jpg, png, jpeg
    if (($extension != "png") && ($extension != "jpg") && ($extension != "jpeg")) {
        mysqli_close($conexion);
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
        $nombre_archivo = ",ImAlbum='".$archivo["name"]."'";
        // header('location: ../../index.php');
    }//end move
}

/* 
    QUERY UPDATE
    UPDATE TABLE SET PROPIERITY = VALUE, PROPIERITY = VALUE, PROPIERITY = VALUE, PROPIERITY = VALUE, WHERE PRIMARY_KEY = VALUE;
*/
$update = "UPDATE album SET NomArt = '$nom_artista',NomCan = '$cancion',NomAlbum = '$album'".$nombre_archivo.",DescAlbum = '$descripcion',
Spotify = '$link_s',AppleMusic = '$link_a', IdArt = '$IdArt' WHERE IdAlbum='$idAlbum';";

// echo $update;
$query = mysqli_query($conexion, $update);

    if(!$query){
        mysqli_close($conexion);
        echo '<script> alert("Ocurrio un error al actualizar los datos del album"); </script>';
    }//end if
    else{
        mysqli_close($conexion);
        echo '<script> alert("Los datos del album han sido actualizados de manera correcta"); </script>';
    }//end 

    echo '<script> window.location="../../pages/detalles_album.php?IdAlbum='.$idAlbum.'" </script>';
?>