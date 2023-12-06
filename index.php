<?php
  include('./backend/admin/conexion.php');
  /*QUERY READ * SELECT
    SELECT * FROM TABLE;
    SELECT ATTRIBUTE_A, ATTRIBUTE_B FROM TABLE
  */
  $select = "SELECT album.*, artistas.apodo_art FROM album INNER JOIN artistas ON album.IdArt = artistas.IdArt";

  $query = mysqli_query($conexion,$select);

  //arreglo temporal de informacion
  $albums = array();

  if(mysqli_num_rows($query) != 0){
    while($datos = mysqli_fetch_array($query, MYSQLI_ASSOC)){
      $albums[] = $datos; 
    }
    // print("<pre>".print_r($albums,true)."</pre>");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Musica</title>
  <link rel="stylesheet" href="./css/estilos.css">
  
</head>

<body>
  <header class="header">
    <div class="menu container">
      <input type="checkbox" id="menu">
      <label for="menu">
        <img src="./img/icon.png" class="menu-icono" alt="">
      </label>
      <nav class="navbar">
        <ul>
          <li><a href="./index.php">Inicio</a></li>
          <li><a href="./pages/artista.php">Artistas</a></li>
          <li><a href="./pages/album.php">Album</a></li>
          <li><a href="./pages/buscar.php">Buscar</a></li>
        </ul>
      </nav>
    </div>
    <div class="header-content container">
      <h1>Rolones</h1>
      <p>Chidos</p>
    </div>
  </header>
  <h1 id="titulo">Música</h1>
  <div class="container" id="tb">
    <div class="row ">
      <div class="col">
        <table class="tabla">
          <thead class= "tabla-encabezado">
            <tr>
              <th scope="col">IMAGEN</th>
              <th scope="col">ALBUM</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $html='';
              foreach($albums as $album){
                  $html.='
                  <tr>
                    <td><img src="./img/album/'.$album['ImAlbum'].'" width="25%"></td>
                    <td>'.$album['NomCan'].' <br> '.$album['apodo_art'].'<br> '.$album['NomAlbum'].'
                    <div><a href="'.$album['Spotify'].'"id="btn-1" target="_blank">Spotify</a>
                    <a href="'.$album['AppleMusic'].'" id="btn-2" target="_blank">Apple Music</a>
                    <a href="./pages/detalles_album.php?IdAlbum='.$album['IdAlbum'].'" id="btn-3">Detalles</a>
                    <a href="./pages/detalles_artista.php?IdArt='.$album['IdArt'].'" id="btn-4">Cantante</a>
                    <a href="./backend/album/delete.php?IdAlbum='.$album['IdAlbum'].'" id="btn-2">Eliminar</a>
                    </div>
                  </tr>
                  ';
              }
              echo $html;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>