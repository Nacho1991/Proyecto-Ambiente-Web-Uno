<body>
    <header class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('user/index') ?>">Universidad Técnica Nacional</a>
            </div>
            <div class="navbar-collapse collapse">

                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url('user/index') ?>">Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('career/obtenerCarreras') ?>">Carreras</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student/obtenerStudents') ?>">Estudiantes</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('user/obtenerUsers') ?>">Usuarios</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Opciones</a></li>
                    <li>
                        <div class="btn-group navbar-btn">
                            <button class="btn btn-danger">Ignacio Valerio Vega</button>
                            <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Perfil</a></li>
                                <li><a href="#">Configuración</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div><!--/.navbar-collapse -->
        </div>
    </header>
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
                                    if ($usuarios != NULL) {
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
                                    } else {
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
</body>
</html>

