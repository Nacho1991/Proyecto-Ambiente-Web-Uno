
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
                        <button class="btn btn-default">Ignacio Valerio Vega</button>
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
<!-- Principal -->
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <!-- Izquierdo -->
            <strong>Mantenimientos</strong>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo base_url('user/index') ?>" title="Dashboard">Dashboard</a></li>
                <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" title="Carreras">Carreras</a></li>
                <li class="active"><a href="<?php echo base_url('student/obtenerStudents') ?>" title="Estudiantes">Estudiantes</a></li>
                <li><a href="<?php echo base_url('user/obtenerUsers') ?>" title="Usuarios">Usuarios</a></li>
                <li><a href="#" title="Informacion">Información</a></li>
            </ul>
        </div><!-- /span-3 -->
        <div class="col-md-10">
            <!-- Right -->
            <strong><span class="glyphicon glyphicon-dashboard"></span> Actualizar estudiante</strong>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <form action="<?php echo base_url('student/actualizar') ?>" method="post" accept-charset="utf-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Datos del estudiante
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                foreach ($detalles->result()as $row) {
                                    echo
                                    "<div class=control-group>
                                        <label>N° registro:</label> 
                                            <div class=control-group>
                                                <input class=form-control readonly= type=text value={$row->id_estudiante} name=id />
                                            </div>             
                                    </div>
                                    <div class=control-group>
                                        <label>Cédula:</label>
                                            <div class=control-group>
                                                <input class=form-control type=text value={$row->cedula} name=cedula />
                                            </div>
                                    </div>
                                    <div class=control-group>
                                        <label>Nombre:</label>
                                        <div class=control-group>
                                            <input class=form-control type=text value={$row->nombre} name=nombre />   
                                        </div>
                                    </div>";
                                }
                                ?>
                                <div class="control-group">
                                    <label>Carrera:</label>
                                    <div class="controls">
                                        <select class="form-control" name="carreras" id="carreras">
                                            <?php
                                            if ($carreras != NULL) {
                                                foreach ($carreras->result()as $row) {
                                                    echo "<option value=$row->codigo_carrera>$row->codigo_carrera</option>";
                                                }
                                            } else {
                                                echo "<option value=0>No hay habilidades disponibles</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Habilidades:</label>
                                    <div class="controls">
                                        <select class="form-control" name="habilidades" id="habilidades">
                                            <?php
                                            if ($skills != NULL) {
                                                foreach ($skills->result()as $row) {
                                                    echo "<option value=$row->id_skills>$row->descripcion</option>";
                                                }
                                            } else {
                                                echo "<option value=0>No hay habilidades disponibles</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Nivel de inglés:</label>
                                    <div class="controls">
                                        <select class="form-control" name="ingles" id="ingles">
                                            <option value="Básico">Básico</option>
                                            <option value="Nivel 1">Nivel 1</option>
                                            <option value="Nivel 2">Nivel 2</option>
                                            <option value="Nivel 3">Nivel 3</option>
                                            <option value="Nivel Avanzado">Nivel Avanzado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <input class="btn btn-success" type="submit" name="btnActualizar" value="Actualizar">
                            </div>
                        </div><!--/panel-->
                    </form>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Comentarios realizados
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre del profesor</th>
                                    <th>Comentario</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($comentarios != NULL) {
                                    foreach ($comentarios->result()as $row) {
                                        echo
                                        "<tr>
                                                                    <td>{$row->nombre_profesor}</td>
                                                                    <td>{$row->comentario}</td>
                                                                    <td>{$row->fecha}</td>
                                                                    
                                                                    
                                                                </tr>";
                                    }
                                } else {
                                    echo"<tr>
                                                                 <td colspan=3 align=center>
                                                                    No hay comentarios
                                                                    </td>
                                                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Proyectos asociados
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre del curso</th>
                                    <th>Duración</th>
                                    <th>Tecnologias</th>
                                    <th>Descripción</th>
                                    <th>Calificación</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($proyectos != NULL) {
                                    foreach ($proyectos->result()as $row) {
                                        echo
                                        "<tr>
                                                                    <td>{$row->curso_fk}</td>
                                                                    <td>{$row->duracion}</td>
                                                                    <td>{$row->tecnologias_fk}</td>
                                                                    <td>{$row->descripcion}</td>
                                                                    <td>{$row->calificacion}</td>
                                                                    <td>{$row->fecha}</td>
                                                                </tr>";
                                    }
                                } else {
                                    echo"<tr>
                                                                 <td colspan=6 align=center>
                                                                    No hay proyectos asociados
                                                                    </td>
                                                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="panel-footer">
                            <a href="<?php echo base_url('student/obtenerStudents') ?>"><button class="btn btn-primary" type="button" name="btnAtras">Atrás</button></a>
                        </div>
                    </div>

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
