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
  <h1 class="bg-dark text-center text-light mb-3">Lista de alumnos</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="./pages/alumnos.php" class="btn btn-dark mb-3">Nuevo Alumno</a>
                <table border="3" class="table">
            <caption>Tabla de alumnos</caption>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>AP</th>
                <th>AM</th>
                <th>Imágen</th>
            </tr>
            <tr>
                <td>1</td>
                <td colspan="3">Gerardo Juárez Hernández</td>
                <td><img src="niño1.jpg" alt="ImagenA"></td>
            </tr>
            <tr>
                <td>2</td>
                <td colspan="3">Pedro Fernández Martínez</td>
                <td><img src="niño2.jpg" alt="ImagenA"></td>
            </tr>
            <tr>
                <td>3</td>
                <td colspan="3">Juan Pérez Cortez/td>
                <td><img src="niño3.jpg" alt="ImagenA"></td>
            </tr>
        </table>
                <table class="table ">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Alumno</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Jorge Eduardo Xalteno Altamirano</td>
                            <td>
                                <a href="./pages/detalles_alumno.php" class="btn btn-primary">Detalles</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Augusto Melendez Teodoro</td>
                            <td>
                                <a href="./pages/detalles_alumno.php" class="btn btn-primary">Detalles</a>
                            </td>
                        </tr>
                    </tbody>
         <!--            <?php
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
                    ?> -->
                </table>
            </div>
        </div>

    </div>
</body>
</html>