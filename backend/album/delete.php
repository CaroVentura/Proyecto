<?php
    include("../admin/conexion.php");

    //echo 'Validando datos...<br>';

    if(!isset($_GET['IdAlbum'])){
        mysqli_close($conexion);
        echo    '<script>
                    alert("Alumno no encontrado...");
                    window.location = "../../index.php";
                </script>';
    }//end if isset

    //Capturamos nuestro id_alumno
    $id_album =  $_GET['IdAlbum'];

    /**
        SQL QUERY DELETE
        DELETE FROM TABLE;
        DELETE FROM TABLE WHERE PRIMARY_KEY = VALUE;
    **/
    $delete = "DELETE FROM album WHERE IdAlbum = '$id_album';";
    echo $delete;

    $query = mysqli_query($conexion, $delete);

    if(!$query){
        echo    '<script>
                    alert("Error al eliminar los datos del album.");
                </script>';
    }//end id query
    else {
        echo    '<script>
                    alert("Los datos del album han sido elimidos de manera correcta.");
                </script>';
    }//end else

    mysqli_close($conexion);

    echo    '<script>
                window.location = "../../index.php";
            </script>';