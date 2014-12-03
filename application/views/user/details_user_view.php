<body>
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
    <h3 class="page-header">Detalles del usuario</h3>
</center>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!--Tabla que contiene todos los registros de los usuarios de la base de datos!-->
            <div id="divLista" class="container"> 
                <div class="row"> 
                    <div class="col-xs-12"> 
                        <div class="table-responsive"> 
                            <center>
                                <?php
                                $id_usuarios;
                                foreach ($detalles->result()as $row) {
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
                                    "<div class=form-group>
                                                        <label>N° registro: <input class=form-control readonly= type=text value={$row->id_usuarios} name=id /></label> 
                                                        <label>Cédula: <input class=form-control readonly= type=text value={$row->cedula} name=cedula /></label>   
                                                    </div>
                                                    <div class=form-group>
                                                        <label>Nombre:  <input class=form-control readonly= type=text value={$row->nombre} name=nombre /></label>   
                                                        <label>Nombre de usuario: <input class=form-control readonly= type=text value={$row->nombre_usuario} name=nombreusuarios /></label> 
                                                    </div>
                                                    <div class=form-group>
                                                        <label>Contraseña: <input class=form-control readonly= type=text value={$row->contrasenna} name=contrasenna /> </label>
                                                        <label>Rol: <input class=form-control readonly= type=text value=" . $roleAdministrativo . " name=role /></label> 
                                                    </div>";
                                }
                                ?>
                                <a href="../obtenerUsers"><button class=btn-info>Atrás</button></a>
                            </center>
                        </div> 
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>
</body>
</html>