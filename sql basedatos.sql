CREATE DATABASE Universidad;
use Universidad;

create table estudiante ( 
id_estudiante integer primary key auto_increment not null,
cedula varchar (20) not null unique, 
nombre varchar (50) not null,
carrera_fk varchar (50) not null, 
nivel_ingles varchar (20) not null,
skill_fk integer (10)not null,
FOREIGN KEY (carrera_fk) REFERENCES carreras(codigo_carrera) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (skill_fk) REFERENCES skills(id_skills) ON UPDATE CASCADE ON DELETE CASCADE
);
INSERT INTO estudiante (cedula,nombre,carrera_fk,nivel_ingles,skill_fk)
VALUES('206910083','Ignacio Valerio Vega','ISW','Basico',1);
DROP TABLE estudiante;
SELECT * FROM estudiante;

create table carreras(
id_carreras integer primary key auto_increment,
codigo_carrera varchar (50) not null unique,
nombre varchar (50) not null
);
INSERT INTO carreras (codigo_carrera,nombre)VALUES('ISW','Ingenieria en Software');
SELECT * FROM carreras;
Drop table carreras;

create table skills(
id_skills integer (10) primary key auto_increment not null,
descripcion varchar (50) not null
);
INSERT INTO skills(descripcion)VALUES('VRUTO');
drop table skills;

create table proyectos(
id_proyectos integer (10) primary key auto_increment not null,
estudiante_fk varchar (20) not null,
curso_fk varchar (50) not null,
duracion varchar (50)not null,
tecnologias_fk integer (10) not null,
descripcion varchar (50) not null,
calificacion varchar (50) not null,
fecha date not null,
FOREIGN KEY (estudiante_fk) REFERENCES estudiante(cedula) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (curso_fk) REFERENCES cursos(codigo_curso) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (tecnologias_fk) REFERENCES tecnologias(id_tecnologias) ON UPDATE CASCADE ON DELETE CASCADE
);

create table cursos(
id_cursos integer (10) primary key auto_increment not null,
codigo_curso varchar (50) not null unique,
nombre varchar (50) not null
);

create table tecnologias(
id_tecnologias integer (10) primary key auto_increment not null,
nombre varchar (50) not null
);

create table comentarios(
id_comentarios integer primary key auto_increment not null,
estudiante_fk varchar (20) not null,
usuario_fk varchar (20) not null,
fecha date not null,
comentario varchar (50) not null,
FOREIGN KEY (estudiante_fk) REFERENCES estudiante(cedula) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (usuario_fk) REFERENCES usuarios(cedula) ON UPDATE CASCADE ON DELETE CASCADE
);

create table usuarios(
id_usuarios integer (10) primary key auto_increment not null,
cedula varchar (20) not null unique,
nombre varchar (50) not null,
nombre_usuario varchar (50) not null,
contrasenna varchar (50) not null,
role_fk integer (10) not null,
FOREIGN KEY (role_fk) REFERENCES roles(id_roles) ON UPDATE CASCADE ON DELETE CASCADE
);
INSERT INTO usuarios (cedula,nombre,nombre_usuario,contrasenna,role_fk)VALUES('206910083','Ignacio Valerio Vega','Nacho','1',1);
SELECT * FROM usuarios;
UPDATE usuarios SET nombre = 'Misael', nombre_usuario = 'Misa', contrasenna = '1', role_fk=1 
WHERE cedula = '206910083';

create table roles(
id_roles integer (10) primary key auto_increment not null,
tipo_usuario varchar (50) not null
);
INSERT INTO roles(tipo_usuario)VALUES ('Administrador');
