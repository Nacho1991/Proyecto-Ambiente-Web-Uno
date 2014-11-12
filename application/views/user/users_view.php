
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
                    <li><a href="<?php echo base_url('user/index') ?>"class="tip-top">Dashboard</a></li>
                    <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" class="tip-top">Carreras</a></li>
                    <li><a href="<?php echo base_url('student/obtenerStudents') ?>" class="tip-top">Estudiantes</a></li>
                    <li class="active"><a href="<?php echo base_url('user/obtenerUsers') ?>" class="tip-top">Usuarios</a></li>
                    <li><a href="" data-toggle="tab" data-placement="top" class="tip-top">Acerca de..</a></li>
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
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#nuevousuario">Nuevo</button>
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
                                                                echo
                                                                "<tr>
                                                                    <td>{$row->id_usuarios}</td>
                                                                    <td>{$row->cedula}</td>
                                                                    <td>{$row->nombre}</td>
                                                                    <td>{$row->nombre_usuario}</td>
                                                                    <td>{$row->contrasenna}</td>
                                                                    <td>{$row->role_fk}</td>
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

                                    <!--Modelo encargado de registrar los usuarios a la base de datos!-->

                                    <div class="modal fade"  id="nuevousuario">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                                    <center>
                                                        <h4 class="page-header">Registrar usuario</h4>
                                                    </center>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('user/insert') ?>" method="post" accept-charset="utf-8">
                                                            <div class="form-group">
                                                                <label for="txtCedula">Cédula:</label>
                                                                <input type="text" class="form-control" name="txtCedulaRegistrar" id="txtCedula"
                                                                       placeholder="Cédula de usuario">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="txtNombre">Nombre:</label>
                                                                <input name="txtNombreRegistrar" type="text" class="form-control" id="txtNombre" 
                                                                       placeholder="Nombre de usuario">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="txtNombreUsuario">Nombre de usuario:</label>
                                                                <input name="txtNombreUsuarioRegistrar" type="text" class="form-control" id="txtNombreUsuario" 
                                                                       placeholder="Nombre de usuario">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="txtContrasenna">Contraseña:</label>
                                                                <input name="txtContrasennaUsuario" type="text" class="form-control" id="txtContrasenna" 
                                                                       placeholder="Contraseña">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="txtContrasennaVerificar">Contraseña:</label>
                                                                <input name="txtContrasennaUsuario" type="text" class="form-control" id="txtContrasennaVerificar" 
                                                                       placeholder="Verificar contraseña">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cmbRolAdministrativo">Sede:</label>
                                                                <select name="cmbRolAdministrativoRegistrar" id="cmbRolAdministrativo" class="form-control selectpicker">
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <center>
                                                            <input class="btn btn-success" type="submit" value="Registrar">
                                                            <button id="btnSalirCarrera" class="btn btn-danger" data-dismiss="modal" type="button">Salir</button>
                                                        </center>
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

