DROP DATABASE IF EXISTS musica;
CREATE DATABASE IF NOT EXISTS musica DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE musica;

GRANT ALL PRIVILEGES ON musica.* TO 'usuariomusica'@'localhost' IDENTIFIED BY 'usuariomusica8';

create table artistas
(IdArt int(11) primary key auto_increment,
 NombreArt varchar (25) not null, ApArt varchar (25) not null, 
 AmArt varchar (25) not null, ImArt varchar (100) default null, 
 apodo_art VARCHAR(50) not null,DescArt text not null);

 create table album(
    IdAlbum int (11) primary key auto_increment, 
    NomArt varchar (25) not null, NomCan varchar (25) not null, 
    NomAlbum varchar (25) not null, ImAlbum varchar (100) default null, 
    DescAlbum text not null, Spotify varchar (255) not null, AppleMusic varchar (255) not null, IdArt int(11) not null,
    FOREIGN KEY(IdArt) REFERENCES artistas (IdArt) ON DELETE CASCADE ON UPDATE CASCADE);