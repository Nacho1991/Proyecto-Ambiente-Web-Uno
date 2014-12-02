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
                <li><a href="<?php echo base_url('user/index') ?>"class="tip-top">Dashboard</a></li>
                <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" class="tip-top">Carreras</a></li>
                <li><a href="<?php echo base_url('student/obtenerStudents') ?>" class="tip-top">Estudiantes</a></li>
                <li class="active"><a href="<?php echo base_url('user/obtenerUsers') ?>" class="tip-top">Usuarios</a></li>

            </ul>
            <div id="my-tab-content" class="tab-content">

                <!--Tab de usuarios !-->

                <div class="tab-pane active" id="usuarios">
                    <center>
                        <h3 class="page-header">Actualizar usuario</h3>
                    </center>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">

                                <br>
                                <br>

                                <!--Tabla que contiene todos los registros de los usuarios de la base de datos!-->

                                <div id="divLista" class="container"> 
                                    <div class="row"> 
                                        <div class="col-xs-12"> 
                                            <div class="table-responsive"> 
                                                <center>
                                                    <form action="<?php echo base_url('user/actualizar') ?>" method="post" accept-charset="utf-8">
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
                                                            </select></label>
                                                        <input type="submit" value="Actualizar" class="btn btn-info" name="btnActualizar">
                                                    </form>
                                                    <a href="../obtenerUsers"><button class="btn btn-success">Atrás</button></a>
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
</body>
</html>