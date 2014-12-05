
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
                <li class="active">
                    <a href="<?php echo base_url('user/obtenerUsers') ?>">Usuarios</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Opciones</a></li>
                <li>
                    <div class="btn-group navbar-btn">
                        <button class="btn btn-default">Ignacio Valerio Vega</button>
                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Perfil</a></li>
                            <li><a href="#">Configuración</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('user/logout') ?>">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</header>


<!-- Principal -->
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <!-- Izquierdo -->
            <strong>Mantenimientos</strong>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo base_url('user/index') ?>" title="Dashboard">Dashboard</a></li>
                <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" title="Carreras">Carreras</a></li>
                <li><a href="<?php echo base_url('student/obtenerStudents') ?>" title="Estudiantes">Estudiantes</a></li>
                <li class="active"><a href="<?php echo base_url('user/obtenerUsers') ?>" title="Usuarios">Usuarios</a></li>
                <li><a href="#" title="Informacion">Información</a></li>
            </ul>
        </div><!-- /span-3 -->
        <div class="col-md-10">
            <!-- Right -->
            <strong><span class="glyphicon glyphicon-dashboard"></span> Registrar usuario</strong>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <form class="form form-vertical"  action="<?php echo base_url('user/insert') ?>" method="post" accept-charset="utf-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Formulario
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="control-group">
                                    <label>Cédula:</label>
                                    <div class="controls">
                                        <input placeholder="Cédula" class="form-control" type="text" name="cedula" />
                                    </div>
                                </div>      
                                <div class="control-group">
                                    <label>Nombre:</label>
                                    <div class="controls">
                                        <input placeholder="Nombre y apellidos" class=form-control type="text" name="nombre" />
                                    </div>
                                </div>   
                                <fieldset>
                                    <div class="control-group">
                                        <legend>Datos de acceso</legend>
                                        <div class="controls">
                                            <label>Nombre de usuario:</label>
                                            <input type="text" class="form-control" placeholder="Nombre de usuario" name="nombreusuario">
                                        </div>
                                        <div class="controls">
                                            <label>Contraseña: 
                                                <input size="30" placeholder="Contraseña" class="form-control" type="password" name="contrasenna" />
                                            </label>
                                            <label>Contraseña:
                                                <input size="30" placeholder="Vuelva a digitar la contraseña" class="form-control" type="password" name="verificarcontrasenna" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label>Rol:</label>
                                        <div class="controls">
                                            <select class="form-control" name="roles">
                                                <?php
                                                foreach ($roles->result()as $row) {
                                                    echo "<option value=$row->id_roles>$row->tipo_usuario</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div><!--/panel content-->
                            <div class="panel-footer">
                                <input type="submit" value="Registrar" name="btnRegistrar" class="btn btn-info">
                                <a href="<?php echo base_url() ?>user/obtenerUsers"><button class="btn btn-success" type="button">Atrás</button></a>
                            </div>
                        </div><!--/panel-->
                    </form>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Acerca de</div>
                        <div class="panel-body">
                            Proyecto Final de Ambiente Web 1.
                            <br><br>
                            Universidad Técnica Nacional.
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Intengrantes</div>
                        <div class="panel-body">
                            Ignacio Valerio Vega
                            <br><br>
                            Misael Valerio Murillo
                            <br><br>
                            Diego Bonilla Espinoza
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

