
create database svaBD;

use svaBD;

CREATE TABLE proveedores (
  idproveedor int(11) auto_increment NOT NULL ,
  nombre_proveedor varchar(100) NOT NULL,
  ruc_proveedor int(11) NOT NULL,
  ubicacion_proveedor varchar(50) NOT NULL,
  direccion_proveedor varchar(100) NOT NULL,
  nro_cuenta varchar(100) DEFAULT NULL,
  primary key(idproveedor)
) ;

CREATE TABLE persona (
  idpersona int(11) auto_increment NOT NULL,
  nombreap varchar(100) NOT NULL,
  tipo_documento varchar(20) DEFAULT NULL,
  num_documento varchar(15) DEFAULT NULL,
  direccion varchar(70) DEFAULT NULL,
  primary key(idpersona)
);


CREATE TABLE categoria (
  idcategoria int(11) auto_increment NOT NULL,
  nombre varchar(50) NOT NULL,
  descripcion varchar(256) DEFAULT NULL,
  condicion tinyint(1) NOT NULL,
  primary key(idcategoria)
);

create table tusuario
(
  idUsuario int(15) auto_increment not null,
  nombre varchar(50) not null,
  apellido varchar(50) not null,
  sexo varchar(10),
  email varchar(255) not null,
  password varchar(60) not null,
  imagen varchar(255),
  cargo varchar(20) not null,
  fechaRegistro datetime not null,
  fechaModificacion datetime not null,
  primary key(idUsuario)
);

