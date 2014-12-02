
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
            <li class="active"><a href="<?php echo base_url('student/obtenerStudents') ?>" class="tip-top">Estudiantes</a></li>
            <li><a href="<?php echo base_url('user/obtenerUsers') ?>" class="tip-top">Usuarios</a></li>

        </ul>
        <div id="my-tab-content" class="tab-content">

            <!--Tab de usuarios !-->

            <div class="tab-pane active" id="usuarios">
                <center>
                    <h3 class="page-header">Registrar estudiante</h3>
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
                                            <form action="<?php echo base_url('student/actualizar') ?>" method="post" accept-charset="utf-8">
                                                <center>
                                                    <?php
                                                    foreach ($detalles->result()as $row) {
                                                        echo "<label>N° registro:<input class=form-control type=text name=id value={$row->id_estudiante} readonly= /></label>"
                                                        . "<label>Cedula:<input class=form-control type=text name=cedula value={$row->cedula} /></label>"
                                                        . "<label>Nombre:<input class=form-control type=text name=nombre value={$row->nombre} /></label>";
                                                    }
                                                    ?>
                                                    <label>Carreras:
                                                        <select class="form-control custom" name="carreras" id="carreras">
                                                            <?php
                                                            if ($carreras != NULL) {
                                                                foreach ($carreras->result()as $row) {
                                                                    echo "<option value=$row->codigo_carrera>$row->nombre</option>";
                                                                }
                                                            } else {
                                                                echo "<option value=0>Sin carreras registradas</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </label>
                                                    <label>Habilidades:
                                                        <select class="form-control custom" name="habilidades" id="habilidades">
                                                            <?php
                                                            if ($skills != NULL) {
                                                                foreach ($skills->result()as $row) {
                                                                    echo "<option value=$row->id_skills>$row->descripcion</option>";
                                                                }
                                                            } else {
                                                                echo "<option value=0>No hay habilidades disponibles</option>";
                                                            }
                                                            ?>
                                                        </select></label>
                                                    <label>Nivel de ingles:
                                                        <select class="form-control custom" name="ingles" id="ingles">
                                                            <option value="Básico">Básico</option>
                                                            <option value="Nivel 1">Nivel 1</option>
                                                            <option value="Nivel 2">Nivel 2</option>
                                                            <option value="Nivel 3">Nivel 3</option>
                                                            <option value="Nivel Avanzado">Nivel Avanzado</option>
                                                        </select>
                                                    </label>
                                                    <input class="btn btn-primary" type="submit" name="btnActualizar" value="Actualizar">

                                                </center>
                                            </form>
                                            <center>
                                                <a href="../obtenerStudents"><button type="button" class="btn btn-success">Atrás</button></a>
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
