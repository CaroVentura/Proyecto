<?php
    //Iniciación de la conexión
    include("../backend/admin/conexion.php");

    $select_artista = "SELECT IdArt, apodo_art FROM artistas;";

    $query_artista = mysqli_query($conexion,$select_artista);

    $artistas = array();

    if(mysqli_num_rows($query_artista) != 0){
        while($datos = mysqli_fetch_array($query_artista, MYSQLI_ASSOC)){
            $artistas[] = $datos;
        }
        // print("<pre>".print_r($artistas)."</pre>");
    }
    $album_id = isset($_GET['IdAlbum']) ? $_GET['IdAlbum'] : null;

    if ($album_id) {
    // Obtener información del álbum específico si se proporciona un ID
    $select = "SELECT * FROM musica WHERE IdAlbum = $album_id";
    $query = mysqli_query($conexion, $select);
    $album = mysqli_fetch_assoc($query);

} 
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
        <h1 class="text-white">Registrar nuevo álbum</h1>
        </center>
        <center>
        <figure> 
            <img src="https://static.vecteezy.com/system/resources/previews/021/693/747/non_2x/music-album-icon-vector.jpg" width="200x200">
        </figure>
        </center>
    </div>
    <section  style="background-color: gray;">
        <div class="container">
        <form action="../backend/album/insert_album.php" method="POST" enctype="multipart/form-data" >
            
          <div class="row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Nombre Albúm</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Nombre albúm" name="album">
            </div>

            <!-- Título -->
            <div class="form-group col-md-4">
              <label for="inputEmail4">Título Música</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Título música" name="cancion">
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
              <select id="nom_artista" class="custom-select mr-sm-2" name="nom_artista">
                <option value="" selected>Selecciona un artista</option>
                <?php
                    foreach ($artistas as $artista) {
                        $apodo_artista = $artista['apodo_art'];
                        $selected = ($album['IdArt'] == $artista['IdArt']) ? 'selected' : '';
                        echo "<option value='{$artista['IdArt']}' $selected>$apodo_artista</option>";
                    }
                    ?>
              </select>
            </div>
            <!-- Spotify -->
            <div class="form-group col-md-4">
              <label for="inputEmail4">Link Spotify</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Link Spotify" name="linkS">
            </div>

            <!-- Apple -->
            <div class="form-group col-md-4">
              <label for="inputEmail4">Apple Music</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Link Apple Music" name="linkA">
            </div>

          </div>

            <div class="form-row">
              <!-- Descripcion -->
              <div class="form-group col-md-12">
                <label for="inputEmail4">Descripción del albúm</label>
                <textarea class="form-control" placeholder="Ingresa la descripción del albúm aquí..." name="descripcion"></textarea>
              </div>
            </div>
            <div class="form-row">
                
                    <div class="form-group col-md-1 mr-3" >
                      <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                    <div class="form-group col-md-1">
                      <button type="reset" class="btn btn-dark">Limpiar</button>
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