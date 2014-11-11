<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Universidad Técnica Nacional</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/bootstrap-theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/bootstrap.min.css">

        <script src="<?php echo base_url(); ?>JS/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>JS/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>JS/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>JS/npm.js"></script>
        <script src="<?php echo base_url(); ?>JS/bootbox.min.js"></script>
        <script src="<?php echo base_url(); ?>JS/bootbox.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-default navbar-left">
                    <li>
                        <div class="flip">
    <!--                            <img  src="<?php echo base_url(); ?>Images/Logo.png" class="imagen flip-1" alt="Imagen responsive">
                            <div class="flip-2"><img  src="<?php echo base_url(); ?>Images/Logo.png" class="imagen flip-1" alt="Imagen responsive"> </div>-->
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-default navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Opciones <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Configuración</a></li>
                            <li><a href="#">Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="Login.html" target="_self">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div id="content">
                <ul id="tabs" class="nav nav-pills" data-tabs="tabs">
                    <li><a href="<?php echo base_url('user/authenticate') ?>" data-toggle="tab" data-placement="top" class="tip-top">Dashboard</a></li>
                    <li class="active"><a href="<?php echo base_url('career/obtenerCarreras') ?>" data-toggle="tab" data-placement="top" class="tip-top">Carreras</a></li>
                    <li><a href="<?php echo base_url('student/obtenerStudents') ?>" data-toggle="tab" data-placement="top" class="tip-top">Estudiantes</a></li>
                    <li><a href="<?php echo base_url('user/obtenerUsers') ?>" data-toggle="tab" data-placement="top" class="tip-top">Usuarios</a></li>
                    <li><a href="" data-toggle="tab" data-placement="top" class="tip-top">Acerca de..</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="carreras">
                        <center>
                            <h3 class="page-header">Carreras</h3>
                        </center>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#nuevacarrera">Nuevo</button>
                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <!--Tabla que contiene todos los registros de las carreras de la base de datos!-->

                                    <div id="divLista" class="container"> 
                                        <div class="row"> 
                                            <div class="col-xs-12"> 
                                                <div class="table-responsive"> 
                                                    <table id="tblTablaCarreras" class="table table table-hover table-bordered table-striped table-condensed"> 
                                                        <thead> 
                                                            <tr class="bg-success"> 
                                                                <th>N° registro</th> 
                                                                <th>Código</th> 
                                                                <th>Nombre</th> 
                                                                <th>Opciones</th>
                                                            </tr>
                                                        </thead> 
                                                        <tbody>
                                                            <?php
                                                            foreach ($carreras->result()as $row) {
                                                                echo
                                                                "<tr>
                                                                    <td>{$row->id_carreras}</td>
                                                                    <td>{$row->codigo_carrera}</td>
                                                                    <td>{$row->nombre}</td>
                                                                    <td> 
                                                                        <input class=btn-danger type=submit value=Eliminar>
                                                                        <input class=btn-success type=submit value=Modificar>
                                                                        <input class=btn-info type=submit value=Ver detalles>
                                                                    </td>
                                                                </tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table> 
                                                </div> 
                                            </div> 
                                        </div> 
                                    </div> 

                                    <!-- Modelo encargado de registrar a los usuarios en la base de datos-->

                                    <div class="modal fade"  id="nuevacarrera">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                    <center>
                                                        <h4 class="page-header">Agregar carrera</h4>
                                                    </center>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('career/insert') ?>" method="post" accept-charset="utf-8">
                                                            <div class="form-group">
                                                                <label for="txtCodCarrera">Código de la carrera:</label>
                                                                <input name="codcarrera" type="text" class="form-control" id="txtCodCarrera"
                                                                       placeholder="Codigo de la carrera">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="txtNombreCarrera">Nombre de la carrera:</label>
                                                                <input name="nombreCarrera"type="text" class="form-control" id="txtNombreCarrera" 
                                                                       placeholder="Nombre de la carrera">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <center>
                                                                    <input class="btn btn-success" type="submit" value="Registrar">
                                                                    <button id="btnSalirCarrera" class="btn btn-danger" data-dismiss="modal" type="button">Salir</button>
                                                                </center>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

