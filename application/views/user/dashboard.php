
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
                <li class="active"><a href="<?php echo base_url('user/index') ?>" class="tip-top">Dashboard</a></li>
                <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" class="tip-top">Carreras</a></li>
                <li><a href="<?php echo base_url('student/obtenerStudents') ?>" class="tip-top">Estudiantes</a></li>
                <li><a href="<?php echo base_url('user/obtenerUsers') ?>"class="tip-top">Usuarios</a></li>

            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="dashboard">
                    <fieldset>
                        <center>
                        <legend>Dashboard</legend>
                        </center>
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <div class="row-fluid">
                                <div class="span3">
                                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                                        <li class="active">
                                            <a href="dashboard.php"><i class="icon-chevron-right"></i> Menú principal</a>
                                        </li>
                                        <li>
                                            <a href="carreras.php"><i class="icon-chevron-right"></i> Carreras</a>
                                        </li>
                                        <li>
                                            <a href="estudiantes.php"><i class="icon-chevron-right"></i> Estudiantes</a>
                                        </li>
                                        <li>
                                            <a href="usuarios.php"><i class="icon-chevron-right"></i> Usuarios</a>
                                        </li>
                                        <li>
                                            <a href="departamentos.php"><i class="icon-chevron-right"></i> Departamentos</a>
                                        </li>
                                    </ul>
                                </div>

                                <!--/span-->
                                <div class="span9" id="content">
                                    <div class="row-fluid">
                                        <!-- block -->
                                        <!-- /block -->
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <!-- block -->
                                            <div class="block">
                                                <div class="navbar navbar-inner block-header">
                                                    <div class="muted pull-left">Carreras</div>
                                                    <div class="pull-right"><span class="badge badge-info">Registros: <?php echo $carreras ?></span>
                                                    </div>
                                                </div>
                                                <div class="block-content collapse in">
                                                    <div class="well" style="margin-top:30px;">
                                                        <button type="button" class="btn btn-large btn-block btn-primary">ir</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /block -->
                                        </div>
                                        <div class="span6">
                                            <!-- block -->
                                            <div class="block">
                                                <div class="navbar navbar-inner block-header">
                                                    <div class="muted pull-left">Estudiantes</div>
                                                    <div class="pull-right"><span class="badge badge-info">Registros: <?php echo $estudiantes ?></span>

                                                    </div>
                                                </div>
                                                <div class="block-content collapse in">
                                                    <div class="well" style="margin-top:30px;">
                                                        <button type="button" class="btn btn-large btn-block btn-primary">ir</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /block -->
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <!-- block -->
                                            <div class="block">
                                                <div class="navbar navbar-inner block-header">
                                                    <div class="muted pull-left">Usuarios</div>
                                                    <div class="pull-right"><span class="badge badge-info">Registros: <?php echo $usuarios ?></span>
                                                    </div>
                                                </div>
                                                <div class="block-content collapse in">
                                                    <div class="well" style="margin-top:30px;">
                                                        <button type="button" class="btn btn-large btn-block btn-primary">ir</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /block -->
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                        </fieldset>
                </div>
            </div>
        </div>
        <footer>
            <p>&copy; Ignacio Valerio</p>
            <p>&copy; Misael Valerio</p>
            <p>&copy; Diego Bonilla</p>
        </footer>
    </div>
</body>
</html>