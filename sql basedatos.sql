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
UPDATE estudiante SET cedula = '206910083',nombre='Misael Valerio Vega',carrera_fk='ISW',nivel_ingles='Avanzado', skill_fk=1 WHERE id_estudiante = 1;
INSERT INTO estudiante (cedula,nombre,carrera_fk,nivel_ingles,skill_fk)
VALUES('206910083','Ignacio Valerio Vega','ISW','Basico',1);
DROP TABLE estudiante;
SELECT * FROM estudiante;

create table carreras(
	id_carreras integer primary key auto_increment,
	codigo_carrera varchar (50) not null unique,
	nombre varchar (50) not null
);
UPDATE carreras SET codigo_carrera = 'ISW', nombre = 'Ingenieria en Software' WHERE id_carreras = 7;
INSERT INTO carreras (codigo_carrera,nombre)VALUES('ISW','Ingenieria en Software');
SELECT * FROM carreras;
USE Universidad;
Drop table carreras;

create table skills(
	id_skills integer (10) primary key auto_increment not null,
	descripcion varchar (50) not null
);
use Universidad;
UPDATE skills SET descripcion = 'Trabajo en equipo' WHERE id_skills = 1;
INSERT INTO skills(descripcion)VALUES('VRUTO');
SELECT*FROM skills;
drop table skills;

USE Universidad;
create table proyectos(
	id_proyectos integer (10) primary key auto_increment not null,
	estudiante_fk varchar (20) not null,
	curso_fk varchar (50) not null,
	duracion varchar (50)not null,
	tecnologias_fk VARCHAR (50) not null,
	descripcion varchar (50) not null,
	calificacion varchar (50) not null,
	fecha varchar(100) not null,
FOREIGN KEY (estudiante_fk) REFERENCES estudiante(cedula) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (curso_fk) REFERENCES cursos(codigo_curso) ON UPDATE CASCADE ON DELETE CASCADE
);
DROP TABLE proyectos;
SELECT*FROM proyectos;

create table cursos(
	id_cursos integer (10) primary key auto_increment not null,
	codigo_curso varchar (50) not null unique,
	nombre varchar (50) not null
);
INSERT INTO cursos (codigo_curso,nombre)VALUES('ISW-613','Administración de Sistemas Operativos de Red');
SELECT*FROM cursos;

create table tecnologias(
	id_tecnologias integer (10) primary key auto_increment not null,
	nombre varchar (50) not null
);
INSERT INTO tecnologias (nombre)VALUES('Ruby on Rails');
SELECT*FROM tecnologias;

create table comentarios(
	id_comentarios integer primary key auto_increment not null,
	estudiante_fk varchar (20) not null,
	nombre_profesor varchar(50) not null,
	fecha text not null,
	comentario varchar (50) not null,
FOREIGN KEY (estudiante_fk) REFERENCES estudiante(cedula) ON UPDATE CASCADE ON DELETE CASCADE
);
USE Universidad;
SELECT*FROM comentarios;
INSERT INTO comentarios(estudiante_fk,nombre_profesor,fecha,comentario)VALUES('206910083','Ignacio','24/12/2014','Comentario realizado por el profesor 2');
DROP TABLE comentarios;

create table usuarios(
	id_usuarios integer (10) primary key auto_increment not null,
	cedula varchar (20) not null unique,
	nombre varchar (50) not null,
	nombre_usuario varchar (50) not null,
	contrasenna varchar (50) not null,
	role_fk integer (10) not null,
	FOREIGN KEY (role_fk) REFERENCES roles(id_roles) ON UPDATE CASCADE ON DELETE CASCADE
);
USE Universidad;
INSERT INTO usuarios (cedula,nombre,nombre_usuario,contrasenna,role_fk)VALUES('206910083','Ignacio Valerio Vega','Nacho','1',1);
SELECT * FROM usuarios;
UPDATE usuarios SET nombre = 'Misael', nombre_usuario = 'Misa', contrasenna = '1', role_fk=1 
WHERE cedula = '206910083';

create table roles(
	id_roles integer (10) primary key auto_increment not null,
	tipo_usuario varchar (50) not null
);
USE Universidad;
SELECT*FROM roles;
INSERT INTO roles(tipo_usuario)VALUES ('Profesor');
