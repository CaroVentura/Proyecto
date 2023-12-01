<?php

include '../backend/conexion.php';

 //Se realiza la petición sql 
 $query_text = 'SELECT artistas.IdArt, artistas.NombreArt from artistas;';
 //echo $query_text;
 //Se procesa con la consulta a la BD
 $query_res = mysqli_query($conexion, $query_text);
 //Arreglo temporal que almacenara la información
 $artistas = array();
 //Se verifica si hay un resultado
 if(mysqli_num_rows($query_res) != 0){
   while($datos = mysqli_fetch_array($query_res, MYSQLI_ASSOC)){
     $artistas[] = $datos;
   }//end mientras sigan existiendo registros
 }//end if no hay resultados
 //Muestra el arreglo
//  print("<pre>".print_r($artistas, true)."</pre>");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musica</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <header class="header">
        <div class="menu container">
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="../img/menu.png" class="menu-icono" alt="">
            </label>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <ul>
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="./artista.php">Artistas</a></li>
                    <li><a href="./album.php">Album</a></li>
                    <li><a href="./buscar.php">Buscar</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <h1>Rolones</h1>
            <p>Chidos</p>
        </div>
    </header>

    <section class="content" style="background: gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    
                    <br>
                    <h4>Registra un album</h4>
                    <br>
                    <form id="form-artista" action="../backend/insert_album.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                            <br>
                                <div class="form-group col-md-6">
                                <label for="inputAddress">Nombre del album</label>
                                <input type="text" class="form-control" id="nombre_album" name= "nombre_album" placeholder="Nombre">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPassword4">Nombre de la canción</label>
                                <input type="text" class="form-control" id="nom_cancion" name="nom_cancion" placeholder="Nombre de la cancion">
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Artista</label>
                                                <select class="form-control" name="artista">
                                                    <option value="">Selecciona un artista</option>
                            <?php
                                      //Declara variables para iterar usuarios 
                                      $html = '';
                                      //verificamos que la variable ya este creada y que el tamaño debe ser mayor a 0
                                      if(isset($artistas) && sizeof($artistas) > 0){
                                        foreach($artistas as $artista){
                                          $html.= '
                                                    <option value="'.$artista["IdArt"].'">'.$artista["NombreArt"].'</option>
                                                ';
                                       }
                                      } 
                                      echo $html; 
                                      ?>
                                      </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8"></div>
                                <div class="form-group col-md-4">
                                <label for="inputZip">Imagen</label>
                                <input type="file" class="form-control" id="inputZip">
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-4"></div>
                            <div class="form-group col-md-1">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-1">
                            <a href="../index.php" class="btn btn-danger">Cancelar</a>
                            </div>
                            <div class="form-group col-md-4"></div>
                            </div>
                            </form>
                            <br><br>
                </div>

            </div>

        </div>

    </section>

    
</body>
</html>