<?php
    include './backend/conexion.php';

     //Se realiza la petición sql 
    $query_text = 'SELECT NomAlbum, NombreArt, NomCan from artistas INNER JOIN album where artistas.IdArt=album.IdArt;';
    //echo $query_text;
    //Se procesa con la consulta a la BD
    $query_res = mysqli_query($conexion, $query_text);
    //Arreglo temporal que almacenara la información
    $albums = array();
    //Se verifica si hay un resultado
    if(mysqli_num_rows($query_res) != 0){
      while($datos = mysqli_fetch_array($query_res, MYSQLI_ASSOC)){
        $albums[] = $datos;
      }//end mientras sigan existiendo registros
    }//end if no hay resultados
    //Muestra el arreglo
    //  print("<pre>".print_r($albums, true)."</pre>");
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
              <th scope="col">#</th>
              <th scope="col">IMAGEN</th>
              <th scope="col">ALBUM</th>
            </tr>
          </thead>
          <tbody>
          <tr>
              
          <?php
              // $contador = 0;
              // $html ='';
              // foreach($alumnos as $alumno){
              //   $html.='
              //   <tr>
              //   <th scope="row">'.++$contador.'</th>
              //   <td>'.$alumno["nombre_alumno"].''.
              //       $alumno["ap_paterno_alumno"].''. $alumno["ap_materno_alumno"].
              //       '</td>
              //       <td>
              //       <a href="./pages/detalles_alumno.php?id_alumno='.$alumno["id_alumno"].'"
              //       class="btn btn-primary">Detalles</a>
              //       <a href="./backend/alumnos/delete.php?id_alumno='.$alumno["id_alumno"].'"
              //       class="btn btn-danger">Eliminar</a>
              //       </td>
              //       </tr>
              //     ';
              //   }
              //   echo $html;


              //Declara variables para iterar usuarios 
              $html = '';
              //print("<pre>".print_r($usuarios, true)."</pre>");
              //verificamos que la variable ya este creada y que el tamaño debe ser mayor a 0
              if(isset($albums) && sizeof($albums) > 0){
                $num = 0;
                foreach($albums as $album) {
                  $html.= '
                  <tr>
                    <td>'.++$num.'</td>
                    <td scope="row"><img src="./img/musica.jpg" alt="" width="60%"></td>
                    <td>
                      <p>La canción - '.$album["NomCan"].' - es interpretada por el cantante '.$album["NombreArt"].', en el album '.$album["NomAlbum"].'.</p><br>
                      <div><a href=""id="btn-1">Spotify</a>
                      <a href="" id="btn-2"> Apple Music</a>
                    <td>';
               }
              } 
              echo $html; 


            ?>
            
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>
</html>