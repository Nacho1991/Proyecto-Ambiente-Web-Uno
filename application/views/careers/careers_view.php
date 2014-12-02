
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
                            <li><a href="<?php echo base_url('user/authenticate') ?>" target="_self">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div id="content">
                <ul id="tabs" class="nav nav-pills" data-tabs="tabs">
                    <li><a href="<?php echo base_url('user/index') ?>" class="tip-top">Dashboard</a></li>
                    <li class="active"><a href="<?php echo base_url('career/obtenerCarreras') ?>" data-toggle="tab" data-placement="top" class="tip-top">Carreras</a></li>
                    <li>
                        <a href="<?php echo base_url('student/obtenerStudents') ?>" class="tip-top">Estudiantes</a></li>
                    <li><a href="<?php echo base_url('user/obtenerUsers') ?>" class="tip-top">Usuarios</a></li>
                   
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
                                            <span class="input-btn">
                                                <a href="../career/detallesInsertar"> <button class="btn btn-primary">Nuevo</button></a>
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
                                                            if ($carreras != NULL) {
                                                            foreach ($carreras->result()as $row) {
                                                                echo
                                                                "<tr>
                                                                    <td>{$row->id_carreras}</td>
                                                                    <td>{$row->codigo_carrera}</td>
                                                                    <td>{$row->nombre}</td>
                                                                    <td> 
                                                                        <a href=../career/detallesEliminar/{$row->id_carreras}><button class=btn-danger>Eliminar</button></a>
                                                                    <a href=../career/detallesModificar/{$row->id_carreras}><button class=btn-success>Modificar</button></a>
                                                                    <a href=../career/detalles/{$row->id_carreras}><button class=btn-info>Detalles</button></a>
                                                                    </td>
                                                                </tr>";
                                                            }
                                                            }else{
                                                                echo"<tr>
                                                                 <td colspan=7 align=center>
                                                                    No hay registros
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

