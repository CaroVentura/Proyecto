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
          <li><a href="">Inicio</a></li>
          <li><a href="">Artistas</a></li>
          <li><a href="#">Album</a></li>
          <li><a href="">Buscar</a></li>
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
            $contador = 0;
            $html ='';
            foreach($alumnos as $alumno){
              $html.='
              <tr>
              <th scope="row">'.++$contador.'</th>
              <td>'.$alumno["nombre_alumno"].''.
                  $alumno["ap_paterno_alumno"].''. $alumno["ap_materno_alumno"].
                  '</td>
                  <td>
                  <a href="./pages/detalles_alumno.php?id_alumno='.$alumno["id_alumno"].'"
                  class="btn btn-primary">Detalles</a>
                  <a href="./backend/alumnos/delete.php?id_alumno='.$alumno["id_alumno"].'"
                  class="btn btn-danger">Eliminar</a>
                  </td>
                  </tr>
                ';
              }
              echo $html;
            ?>
            <tr>
              <td scope="row"><img src="./img/musica.jpg" alt="" width="60%"></td>
              <td>
                <p>Es una canción interpretada por el cantante y rapero argentino Paulo Londra, en 
                    colaboración con el cantante puertorriqueño Lenny Tavárez.</p><br>
                <div><a href=""id="btn-1">Spotify</a>
                <a href="" id="btn-2"> Apple Music</a>
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