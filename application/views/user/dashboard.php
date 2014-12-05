
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
                    <li class="active">
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
                            <button class="btn btn-default">Ignacio Valerio</button>
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

    <!-- Main -->
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <!-- Left -->
                <strong>Mantenimientos</strong>
                <hr>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="<?php echo base_url('user/index') ?>" title="Dashboard">Dashboard</a></li>
                    <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" title="Carreras">Carreras</a></li>
                    <li><a href="<?php echo base_url('student/obtenerStudents') ?>" title="Estudiantes">Estudiantes</a></li>
                    <li><a href="<?php echo base_url('user/obtenerUsers') ?>" title="Usuarios">Usuarios</a></li>
                    <li><a href="#" title="Informacion">Información</a></li>
                </ul>
            </div><!-- /span-3 -->
            <div class="col-md-10">
                <!-- Right -->
                <strong><span class="glyphicon glyphicon-dashboard"></span> Dashboard</strong>
                <hr>
                <div class="row">
                    <div class="col-md-9">
                        <div class="well">Carreras registradas <span class="badge pull-right"><?php echo $carreras;?></span></div>
                        <div class="well">Estudiantes registrados <span class="badge pull-right"><?php echo $estudiantes;?></span></div>
                        <div class="well">Usuarios registrados <span class="badge pull-right"><?php echo $usuarios;?></span></div>
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