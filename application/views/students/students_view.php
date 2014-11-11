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
        <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/bootstrap-responsive.min.css">

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
                            <li><a href="index.php" target="_self">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div id="content">
                <ul id="tabs" class="nav nav-pills" data-tabs="tabs">
                    <li><a href="<?php echo base_url('user/authenticate') ?>" data-toggle="tab" data-placement="top" class="tip-top">Dashboard</a></li>
                    <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" data-toggle="tab" data-placement="top" class="tip-top">Carreras</a></li>
                    <li class="active"><a href="<?php echo base_url('student/obtenerStudents') ?>" data-toggle="tab" data-placement="top" class="tip-top">Estudiantes</a></li>
                    <li><a href="<?php echo base_url('user/obtenerUsers') ?>" data-toggle="tab" data-placement="top" class="tip-top">Usuarios</a></li>
                    <li><a href="" data-toggle="tab" data-placement="top" class="tip-top">Acerca de..</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">


                    <!--Tab de estudiantes!-->

                    <div class="tab-pane active" id="estudiantes">
                        <center>
                            <h3 class="page-header">Estudiantes</h3>
                        </center>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#nuevousuario">Nuevo</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="divLista" class="container"> 
                                        <div class="row"> 
                                            <div class="col-xs-12"> 
                                                <div class="table-responsive"> 
                                                    <table id="tblTablaCarreras" class="table table table-hover table-bordered table-striped table-condensed"> 
                                                        <thead> 
                                                            <tr class="bg-success"> 
                                                                <th>N° registro</th> 
                                                                <th>Cédula</th> 
                                                                <th>Nombre</th> 
                                                                <th>Carrera</th> 
                                                                <th>Nivel de inglés</th>
                                                                <th>Habilidades</th>
                                                                <th>Opciones</th>
                                                            </tr>
                                                        </thead> 
                                                        <tbody>
                                                            <?php
                                                            foreach ($estudiantes->result()as $row) {
                                                                echo
                                                                "<tr>
                                                                    <td>{$row->id_estudiante}</td>
                                                                    <td>{$row->cedula}</td>
                                                                    <td>{$row->nombre}</td>
                                                                    <td>{$row->carrera_fk}</td>
                                                                    <td>{$row->nivel_ingles}</td>
                                                                    <td>{$row->skill_fk}</td>
                                                                    <td> <input class=btn-danger type=submit value=Eliminar>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>