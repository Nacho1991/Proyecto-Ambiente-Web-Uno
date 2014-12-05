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
                <li class="active">
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

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <!-- Izquierdo -->
            <strong>Mantenimientos</strong>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo base_url('user/index') ?>" title="Dashboard">Dashboard</a></li>
                <li class="active"><a href="<?php echo base_url('career/obtenerCarreras') ?>" title="Carreras">Carreras</a></li>
                <li><a href="<?php echo base_url('student/obtenerStudents') ?>" title="Estudiantes">Estudiantes</a></li>
                <li><a href="<?php echo base_url('user/obtenerUsers') ?>" title="Usuarios">Usuarios</a></li>
                <li><a href="#" title="Informacion">Información</a></li>
            </ul>
        </div><!-- /span-3 -->
        <div class="col-md-10">
            <!-- Right -->
            <strong><span class="glyphicon glyphicon-dashboard"></span> Detalles de la carrera</strong>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Formulario
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php
                            foreach ($detalles->result()as $row) {
                                echo
                                "<div class=control-group>
                                        <label>N° registro:</label> 
                                            <div class=control-group>
                                                <input class=form-control readonly= type=text value={$row->id_carreras} name=id />
                                            </div>             
                                    </div>
                                    <div class=control-group>
                                        <label>Código de carrera:</label>
                                            <div class=control-group>
                                                <input class=form-control readonly= type=text value={$row->codigo_carrera} name=cedula />
                                            </div>
                                    </div>
                                    <div class=control-group>
                                        <label>Nombre:</label>
                                        <div class=control-group>
                                            <input class=form-control readonly= type=text value={$row->nombre} name=nombre />   
                                        </div>
                                    </div>
                                    </div>
                                    <div class=panel-footer>
                                    <a href=../delete/{$row->id_carreras}><button class=btn-danger>Eliminar</button></a>
                                ";
                            }
                            ?>
                            <a href="<?php echo base_url() ?>career/obtenerCarreras"><button class="btn btn-success">Atrás</button></a>
                        </div>
                    </div><!--/panel-->
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


