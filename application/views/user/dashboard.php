
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
<div class="navbar-inner">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">

                    <li>
                        <a href="<?php echo base_url('career/obtenerCarreras') ?>"><i class="icon-chevron-right"></i> Carreras</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('student/obtenerStudents') ?>"><i class="icon-chevron-right"></i> Estudiantes</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('user/obtenerUsers') ?>"><i class="icon-chevron-right"></i> Usuarios</a>
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
                                    <a><button type="button" class="btn btn-large btn-block btn-primary">ir</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <footer>
            <p>&copy;Universidad Técnica Nacional</p>
        </footer>
    </div>

</div>
</body>
</html>