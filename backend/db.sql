DROP DATABASE IF EXISTS musica;
CREATE DATABASE IF NOT EXISTS musica DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE musica;

GRANT ALL PRIVILEGES ON musica.* TO 'usuariomusica'@'localhost' IDENTIFIED BY 'usuariomusica8';

create table Artistas
(IdArt int(11) primary key auto_increment,
 NombreArt varchar (25) not null, ApArt varchar (25) not null, 
 AmArt varchar (25) not null, ImArt varchar (100) default null, 
 DescArt text not null);

 create table Album(
    IdAlbum int (11) primary key auto_increment, 
    NomArt varchar (25) not null, NomCan varchar (25) not null, 
    NomAlbum varchar (25) not null, ImAlbum varchar (100) default null, 
    Spotify varchar (255) not null, AppleMusic varchar (255) not null);
