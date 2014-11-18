
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
                <li><a href="<?php echo base_url('user/index') ?>"class="tip-top">Dashboard</a></li>
                <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" class="tip-top">Carreras</a></li>
                <li><a href="<?php echo base_url('student/obtenerStudents') ?>" class="tip-top">Estudiantes</a></li>
                <li class="active"><a href="<?php echo base_url('user/obtenerUsers') ?>" class="tip-top">Usuarios</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">

                <!--Tab de usuarios !-->

                <div class="tab-pane active" id="usuarios">
                    <center>
                        <h3 class="page-header">Usuarios</h3>
                    </center>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a href="../user/detallesInsertar"><button class="btn btn-primary">Nuevo</button></a>
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <br>

                                <!--Tabla que contiene todos los registros de los usuarios de la base de datos!-->

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
                                                            <th>Nombre de usuario</th> 
                                                            <th>Contraseña</th>
                                                            <th>Rol administrativo</th>
                                                            <th>Opciones</th>
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        <?php
                                                        foreach ($usuarios->result()as $row) {
                                                            switch ($row->role_fk) {
                                                                case 1:
                                                                    $roleAdministrativo = "Administrador";
                                                                    break;
                                                                case 2:
                                                                    $roleAdministrativo = "Director de carrera";
                                                                    break;
                                                                case 3:
                                                                    $roleAdministrativo = "Profesor";
                                                            }
                                                            echo

                                                            "<tr>
                                                                    <td>{$row->id_usuarios}</td>
                                                                    <td>{$row->cedula}</td>
                                                                    <td>{$row->nombre}</td>
                                                                    <td>{$row->nombre_usuario}</td>
                                                                    <td>{$row->contrasenna}</td>
                                                                    <td>$roleAdministrativo</td>
                                                                    <td>
                                                                    <a href=../user/detallesEliminar/{$row->id_usuarios}><button class=btn-danger>Eliminar</button></a>
                                                                    <a href=../user/detallesActualizar/{$row->id_usuarios}><button class=btn-success>Modificar</button></a>
                                                                    <a href=../user/detalles/{$row->id_usuarios}><button class=btn-info>Detalles</button></a>
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

