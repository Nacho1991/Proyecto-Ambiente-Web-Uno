
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
                    <li class="active"><a href="#dashboard" data-toggle="tab" data-placement="top" class="tip-top" data-original-title="Menú principal">Dashboard</a></li>
                    <li><a href="#carreras" data-toggle="tab" data-placement="top" class="tip-top" data-original-title="Gestiona la carreras registradas">Carreras</a></li>
                    <li><a href="#estudiantes" data-toggle="tab" data-placement="top" class="tip-top" data-original-title="Gestiona los registros de los estudiantes">Estudiantes</a></li>
                    <li><a href="<?php echo base_url('user/obtenerUsers') ?>" data-toggle="tab" data-placement="top" class="tip-top" data-original-title="Gestiona los usuarios registrados">Usuarios</a></li>
                    <li><a href="#acercade" data-toggle="tab" data-placement="top" class="tip-top" data-original-title="Brinda información acerca de la emnpresa">Acerca de..</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="dashboard">
                        <center>
                            <h3 class="page-header">Dashboard</h3>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>