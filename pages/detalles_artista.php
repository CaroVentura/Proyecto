<?php

include ('../backend/admin/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musica</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <section><h1 id="titulo">Registrar artista</h1></section>
    <section class="content" style="background: gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <br>
                    <form id="form-artista" action="../backend/artistas/insert_artista.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputAddress">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name= "nombre" placeholder="Nombre(s)">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Apellido paterno</label>
                                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido paterno">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Apellido materno</label>
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Apellido materno">
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Apodo</label>
                                <input type="text" class="form-control" id="apellido_materno" name="apodo_art" placeholder="Apodo del artista">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputZip">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Bibliografía</label>
                                <textarea class="form-control" placeholder="Ingresa la bibliografía del artista aquí..." id="descripcion" name="descripcion"></textarea>
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
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>