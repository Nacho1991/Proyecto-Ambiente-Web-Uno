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
    <h3 class="page-header">Actualizar usuario</h3>
</center>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" action="<?php echo base_url('user/actualizar') ?>" method="post" accept-charset="utf-8">
                <div class="col-md-6">
                    <?php
                    $id_usuarios;
                    foreach ($detalles->result()as $row) {
                        echo
                        "
                                                        <label>N° registro: <input class=form-control readonly= type=text value={$row->id_usuarios} name=id /></label> 
                                                        <label>Cédula: <input class=form-control type=text value={$row->cedula} name=cedula /></label>   
                                                        <label>Nombre:  <input class=form-control type=text value=" . $row->nombre . " name=nombre /></label>   
                                                        <label>Nombre de usuario: <input class=form-control type=text value={$row->nombre_usuario} name=nombreusuarios /></label>"
                        . "<label>Contraseña: <input class=form-control type=password value=" . $row->contrasenna . " name=contrasenna /></label>";
                    }
                    ?>
                    <label>Rol:
                        <select class="form-control custom" name="rol" id="rol">
                            <?php
                            if ($roles != NULL) {
                                foreach ($roles->result()as $row) {
                                    echo "<option value=$row->id_roles>$row->tipo_usuario</option>";
                                }
                            } else {
                                echo "<option value=0>No hay roles disponibles</option>";
                            }
                            ?>
                        </select>
                    </label>
                    <input type="submit" value="Actualizar" class="btn btn-info btn-responsive" name="btnActualizar">
                </div>
            </form>
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="../obtenerUsers"><button class="btn btn-primary btn-responsive">Atrás</button></a>
                </div>
            </div> 
        </div>
    </div> 
</body>
</html>