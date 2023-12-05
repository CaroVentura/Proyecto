<?php
//Incluir el archivo de conexión
include("../admin/conexion.php");

//Para almacenar la información del form registrar
$IdArt = $_POST['IdAlbum'];
$nom_artista = $_POST['nom_artista'];
$cancion = $_POST['cancion'];
$album = $_POST['album'];
$descripcion = $_POST['descripcion'];
$link_s =$_POST['linkS'];
$link_a = $_POST['linkA'];
$idArt = $_POST['nom_artista'];

//se declara una variable para referenciar al input que contiene la imagen
$archivo = $_FILES['imagA'];
//Variable del nombre temporal de la imagen
$nombre_archivo ='';

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
        $nombre_archivo = ",ImAlbum='".$archivo["name"]."'";
        header('location: ../../index.php');
    }//end move
}

/* 
    QUERY UPDATE
    UPDATE TABLE SER PROPIERITY = VALUE, PROPIERITY = VALUE, PROPIERITY = VALUE, PROPIERITY = VALUE, WHERE PRIMARY_KEY = VALUE;
*/
$update = "UPDATE album SET NomCan = '$cancion',NomAlbum = '$album',DescAlbum = '$descripcion',
Spotify = '$link_s',AppleMusic = '$link_a',IdArt = '$idArt' WHERE IdArt='$IdArt'";
echo $update;
?>