<?php
include('../backend/admin/conexion.php');

$consulta = "SELECT album.*, artistas.apodo_art, artistas.NombreArt
            FROM album
            INNER JOIN artistas ON album.IdArt = artistas.IdArt";

// Obtener el término de búsqueda de la variable GET
$query = isset($_GET['query']) ? $_GET['query'] : null;

if ($query) {
    // Añadir condiciones de búsqueda a la consulta
    $consulta .= " WHERE NomCan LIKE '%$query%'
                OR apodo_art LIKE '%$query%'
                OR NomAlbum LIKE '%$query%'";
}

$resultadoConsulta = mysqli_query($conexion, $consulta);

$canciones = array();

while ($cancion = mysqli_fetch_assoc($resultadoConsulta)) {
    $canciones[] = $cancion;
}

$idAlbum = isset($_GET['IdAlbum']) ? $_GET['IdAlbum'] : null;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Buscar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">
    </head>
    <body>

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
    <div class="container-fluid p-3">
    <form class="form-inline my-2 my-lg-0 text-center" method="GET" action="./buscar.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="query">
            <button class="btn bg-personal my-2 my-sm-0 text-white" type="submit">Buscar</button>
    </form>
    </div>

    <section>
    <div class="container-fluid p-3">
    <?php if ($idAlbum) { ?>
        <!-- Sección para el caso de visualización de un álbum específico -->
    <?php } else { ?>
        <h1 class="bg-dark text-center text-light mb-3">Resultados de búsqueda</h1>
        <?php if (empty($canciones)) { ?>
            <p class="text-center text-danger">No se encontraron resultados para la búsqueda.</p>
        <?php } else { ?>
            <div class="row">
                <?php foreach ($canciones as $cancion) { ?>
                    <div class="col-md-6">
                        <div class="card bg-secondary mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="../img/album/<?php echo $cancion['ImAlbum']; ?>" class="card-img"
                                        alt="Imagen del álbum">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title text-light"><?php echo $cancion['NomCan']; ?></h3>
                                        <h5 class="card-text text-light"><?php echo $cancion['apodo_art']; ?></h5>
                                        <p class="card-text text-light"><?php echo $cancion['NomAlbum']; ?></p>
                                        <a href="<?php echo $cancion['Spotify']; ?>" class="btn btn-success">Spotify</a>
                                        <a href="<?php echo $cancion['AppleMusic']; ?>"
                                        class="btn text-danger btn-light">Apple Music</a>
                                        <a href="./detalles_album.php?id=<?php echo $cancion['IdAlbum']; ?>"
                                        class="btn btn-dark">Detalles Álbum</a>
                                        <a href="./detalles_artista.php?id=<?php echo $cancion['IdArt']; ?>"
                                        class="btn btn-dark">Detalles Artista</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    <?php } ?>
</div>
    </section>

            <div class="container"   style="background-color: gray;">
                <br>
                <br>
                <p>Busquedas recientes</p>

                <div class="row">
                <div class="form-group col-md-2">
                    <center>
                    <figure>
                        <img src="https://f4.bcbits.com/img/a1684753505_10.jpg" width="130x130">
                    </figure>
                    </center>
                </div>

                <div class="form-group col-md-2">
                    <br>
                    <p>Honey, No estas</p>
                    <p>Desulucion · Bratty</p>
                </div>

                <div class="form-group col-md-2">
                    <center>
                        <img src="https://m.media-amazon.com/images/I/71ulNeyjxNL.UF1000,1000_QL80.jpg" width="130x130">
                    </center>
                </div>

                <div class="form-group col-md-2">
                    <br>
                    <p>Bad</p>
                    <p>Bad · Michael Jackson</p>

                </div>

                <div class="form-group col-md-2">
                    <center>
                        <img src="https://i.scdn.co/image/ab67616d0000b273164f6eeb838f0a702d9d6319" width="130x130">
                    </center>
                </div>

                <div class="form-group col-md-2">
                    <br>
                    <p>Lugar Correcto</p>
                    <p>De todas las flores · Natalia Lafourcade</p>

                    </div>
                </div>
            </div>

            <div class="container"   style="background-color: gray;">
                <div  class="row">

                    <div class="form-group col-md-2">
                        <center>
                        <img src="https://i.scdn.co/image/ab67616d0000b273e138decf08dd6a0a82f04628" width="130x130">
                        </center>
                    </div>

                    <div class="form-group col-md-2">
                        <br>
                        <p>Yo lo comprendo</p>
                        <p>16 Éxitos, Vol.2 · Victor Yturbe</p>
                    </div>

                    <div class="form-group col-md-2">
                        <center>
                            <img src="https://i.scdn.co/image/ab67616d0000b273e2e352d89826aef6dbd5ff8f" width="130x130">
                        </center>
                    </div>

                    <div class="form-group col-md-2">
                        <br>
                        <p>Sonflower</p>
                        <p>Spider-Man · Swae lee & Post Malone</p>

                    </div>

                    <div class="form-group col-md-2">
                        <center>
                            <img src="https://i.scdn.co/image/ab67616d0000b273dabd5d51c868054fed2d6d68" width="130x130">
                        </center>
                    </div>

                    <div class="form-group col-md-2">
                        <br>
                        <p>All Out of love</p>
                        <p>Lost in love · Air Supply</p>
                    </div>
                </div>
            </div>

            <div class="container"   style="background-color: gray;">
                <br>
                <br>
                <p>Explorar Categorias</p>

                <div class="row">

                    <div class="form-group col-md-4">
                        <img src="https://pop100.es/wp-content/uploads/2021/02/pop4-1.png" width="300px" height="155px">
                    </div>

                    <div class="form-group col-md-4">
                        <img src="https://blog.onerpm.com/wp-content/uploads/2020/09/16_sep_2-780x405.jpg" width="300px">
                    </div>

                    <div class="form-group col-md-4">
                        <img src="https://akamai.sscdn.co/uploadfile/letras/playlists/b/3/6/5/b365d452edf04890a7ce7bb449161b60.jpg" width="275px">
                    </div>
                </div>
            </div>

            <div class="container"   style="background-color: gray;">
                <div class="row">
                    <div class="form-group col-md-4">
                        <br>
                        <img src="https://education-ga.ketcloud.ket.org/wp-content/uploads/3616.jpg" width="300px">
                    </div>

                    <div class="form-group col-md-4">
                        <br>
                        <img src="https://fiverr-res.cloudinary.com/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/330445086/original/f23d5dbd9a0b3cc37a2a3cf400d4a2c89bfb8729.png" width="300px">
                    </div>

                    <div class="form-group col-md-4">
                        <br>
                        <img src="https://media.slidesgo.com/storage/18893963/conversions/0-alternative-music-newsletter-thumb.jpg" width="300px">
                    </div>
                </div>
            </div>
    </body>
</html>