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
                        <h3 class="page-header">Registrar usuario</h3>
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
                                                <form action="<?php echo base_url('user/insert') ?>" method="post" accept-charset="utf-8">
                                                    <center>
                                                        <div class=form-group>
                                                            <label>Cédula: <input placeholder="Cédula" class="form-control" type="text" name="cedula" /></label>
                                                            <label>Nombre:  <input placeholder="Nombre propio del usuario" class=form-control type="text" name="nombre" /></label>   
                                                        </div>
                                                        <div class=form-group>
                                                            <label>Nombre de usuario: <input placeholder="Nombre de usuario" class=form-control type="text" name="nombreusuario" /></label> 
                                                            <label>Role:
                                                                <select class="form-group dropdown" name="roles" id="roles">
                                                                    <?php
                                                                    foreach ($roles->result()as $row) {
                                                                        echo "<option name=$row->id_roles>$row->tipo_usuario</option>";
                                                                    }
                                                                    ?>
                                                                </select></label>
                                                        </div>
                                                        <div class=form-group>
                                                            <label>Contraseña: <input placeholder="Contraseña" class="form-control" type=text name=contrasenna /></label>
                                                            <label>Contraseña:<input placeholder="Vuelva a digitar la contraseña" class="form-control" type=text name=verificarcontrasenna /></label>
                                                        </div>
                                                        <input type="submit" value="Registrar" name="btnRegistrar" class="btn-info">
                                                    </center>
                                                </form>
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

