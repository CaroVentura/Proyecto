<?php
require('../backend/admin/conexion.php'); 
if(isset($_GET["IdAlbum"])){
    $album = array();
    $id_album = $_GET["IdAlbum"];
    /**
        SELECT id_alumno, nombre FROM alumnos WHERE id_alumno = 2;
    */
    $select = "SELECT * FROM album WHERE IdAlbum = '$id_album';";
    // echo $select;
    //Ejecutamos nuestro query
    $query = mysqli_query($conexion, $select);//TRUE
    $album = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if (is_null($album)) {
        mysqli_close($conexion);
        echo '  <script> 
                    alert("Album no encontrado...");
                    window.location = "../index.php";
                </script>';
    }
    mysqli_close($conexion);
}//end if isset
else{
    mysqli_close($conexion);
    echo '  <script> 
                alert("Información no generada de manera correcta...");
                window.location = "../index.php";
            </script>';
}//end else
echo print("<pre>".print_r($album)."</pre>");
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Album</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">
    </head>

    <body>

    <header class="header">
        <div class="menu container">
            <input type="checkbox" id="menu">
            <label for="menu">
            <img src="../img/icon.png" class="menu-icono" alt="">
            </label>
            <nav class="navbar" style="text-decoration: none;">
                <ul>
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="./artista.php">Artistas</a></li>
                    <li><a href="./album.php">Album</a></li>
                    <li><a href="./buscar.php">Buscar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div>
        <br>
        <center>
        <h1 class="text-white">Álbum</h1>
        </center>
        <center>
        <figure> 
            <img src="<?php echo ($album["ImAlbum"] == '') ? '../img/album/' : '../img/album/'.$album["ImAlbum"];?>" width="200x200">
        </figure>
        </center>
        <input type="hidden" value="<?php echo $album["IdAlbum"]; ?>" name="IdAlbum">
    </div>
    <section  style="background-color: gray;">
        <div class="container">
        <form action="../backend/album/update.php" method="POST" enctype="multipart/form-data" >
            
          <div class="row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Nombre Albúm</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Nombre albúm" name="album" value="<?php echo $album["NomAlbum"];?>">
            </div>

            <!-- Título -->
            <div class="form-group col-md-4">
              <label for="inputEmail4">Título Música</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Título música" name="cancion" value="<?php echo $album["NomCan"];?>">
            </div>

            <!-- Imágen -->
            <div class="form-group col-md-4">
              <label for="inputEmail4">Imágen del albúm</label>
                <input type="file" class="form-control" id="imagen" name="imagA">
              </div>
          </div>

          <div class="row">
            <!-- Ártitsta -->
            <div class="col-md-4 mb-4" >
              <label class="mr-sm-2" for="inlineFormCustomSelect">Artista</label>
              <select id="form-select" class="custom-select mr-sm-2" name="nom_artista">
                <option value="" selected>Selecciona un artista</option>
                <?php
                    $html = '';
                    foreach($artistas as $artista){
                        $html.= '<option value="'.$artista["IdArt"].'">'.$artista["apodo_art"].'</option>';  
                    }
                    echo $html;  
                ?>
                <?php
                    foreach($artistas as $artista){
                        $apodo_artista = $artista["apodo_art"];
                        $selected = ($album['IdArt'] == $artista['IdArt']) ? 'selected' : '';
                        echo "<option value='{$artista["IdArt"]}' $selected>$apodo_artista</option>"; 
                    } 
                ?>
              </select>
            </div>
            <!-- Spotify -->
            <div class="form-group col-md-4">
              <label for="inputEmail4">Link Spotify</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Link Spotify" name="linkS" value="<?php echo $album["Spotify"];?>">
            </div>

            <!-- Apple -->
            <div class="form-group col-md-4">
              <label for="inputEmail4">Apple Music</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Link Apple Music" name="linkA" value="<?php echo $album["AppleMusic"];?>">
            </div>

          </div>

            <div class="form-row">
              <!-- Descripcion -->
              <div class="form-group col-md-12">
                <label for="inputEmail4">Descripción del albúm</label>
                <textarea class="form-control" placeholder="Ingresa la descripción del albúm aquí..." name="descripcion" value="<?php echo $album["DescAlbum"];?>"></textarea>
              </div>
            </div>

            <div class="form-row">
                
                    <div class="form-group col-md-1">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
               
                    <div class="form-group col-md-1">
                        <a href="../index.php" class="btn btn-danger">Cancelar</a>
                    </div>
                <div class="form-group col-md-4"></div>
            </div>
          
          </form>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>

</html>