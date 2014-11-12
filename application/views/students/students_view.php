
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
                    <li><a href="<?php echo base_url('user/index') ?>" class="tip-top">Dashboard</a></li>
                    <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" class="tip-top">Carreras</a></li>
                    <li class="active"><a href="<?php echo base_url('student/obtenerStudents') ?>" class="tip-top">Estudiantes</a></li>
                    <li><a href="<?php echo base_url('user/obtenerUsers') ?>" class="tip-top">Usuarios</a></li>
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
                                    <br>
                                    <br>
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
                                                                    <td> <input id=".$row->cedula." class=btn-danger type=submit value=Eliminar>
                                                                         <input id=".$row->cedula." class=btn-success type=submit value=Modificar>
                                                                         <input id=".$row->cedula." class=btn-info type=submit value=Detalles>
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