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
                    <li class="active">
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
    <h3 class="page-header">Eliminar estudiante</h3>
</center>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div id="divLista" class="container"> 
                <form action="<?php echo base_url('student/delete') ?>" method="post" accept-charset="utf-8">
                    <fieldset>
                        <legend>Detalles del estudiante</legend>
                        <?php
                        if ($detalles != null) {
                            foreach ($detalles->result()as $row) {
                                echo "<label>N° registro:<input class=form-control type=text name=id value={$row->id_estudiante} readonly= /></label>"
                                . "<label>Cedula:<input class=form-control type=text name=cedula value={$row->cedula} readonly= /></label>"
                                . "<label>Nombre:<input class=form-control type=text name=nombre value={$row->nombre} readonly= /></label>"
                                . "<label>Carrera:<input class=form-control typetext name=carrera value={$row->carrera_fk} readonly= /></label>"
                                . "<label>Nivel de ingles:<input class=form-control type=text name=ingles value={$row->nivel_ingles} readonly= /></label>"
                                . "<label>Habilidades:<input class=form-control type=text name=ingles value={$row->skill_fk} readonly= /></label>";
                            }
                        }
                        ?>

                    </fieldset>
                    <input class="btn btn-danger" type="submit" name="btnEliminar" value="Eliminar">
                </form>
                <a href="<?php echo base_url('student/obtenerStudents') ?>"><button class="btn btn-primary" type="button" name="btnAtras">Atrás</button></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
