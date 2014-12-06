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
            <strong><span class="glyphicon glyphicon-dashboard"></span> Registrar estudiante</strong>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <form class="form-vertical" action="<?php echo base_url('student/insert') ?>" method="post" accept-charset="utf-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Datos del estudiante
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="control-group">
                                    <label>Cédula:</label>
                                    <div class="controls">
                                        <input placeholder="Cédula del estudiante" class="form-control" type="text" name="cedula" />
                                        <a href="<?php echo base_url() ?>upload">
                                            <button type="button" class="btn btn-success">Cargar foto</button>
                                        </a>
                                    </div>
                                </div>      
                                <div class="control-group">
                                    <label>Nombre:</label>
                                    <div class="controls">
                                        <input placeholder="Nombre y apellidos" class=form-control type="text" name="nombre" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label>Carrera:</label>
                                    <div class="controls">
                                        <select class="form-control" name="carreras" id="carreras">
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
                            </div><!--/panel content-->
                        </div><!--/panel-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Datos del proyecto
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="control-group">
                                    <label>Duración:</label>
                                    <div class="controls">
                                        <input type="text" id="duracion" name="duracion" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Tecnologías</label>
                                    <div class="controls">
                                        <select id="example-getting-started" name="tecnologias[]" multiple="multiple">
                                            <?php
                                            if ($tecnologias != NULL) {
                                                foreach ($tecnologias->result()as $row) {
                                                    echo
                                                    "<option value=$row->id_tecnologias /> $row->nombre";
                                                }
                                            } else {
                                                echo "<label>Sin tecnologias registradas</label>";
                                            }
                                            ?>

                                        </select>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#example-getting-started').multiselect();
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Curso</label>
                                    <div class="controls">
                                        <select class="form-control" name="cursos">
                                            <?php
                                            if ($cursos != NULL) {
                                                foreach ($cursos->result()as $row) {
                                                    echo "<option value=$row->codigo_curso>$row->nombre</option>";
                                                }
                                            } else {
                                                echo "<option value=0>Sin cursos registradas</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Descripción:</label>
                                    <div class="controls">
                                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escriba aquí su descripción" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Fecha:</label>
                                    <div class='input-group date' id='fechapicker'>
                                        <input type='text' id="fecha" name="fecha" class="form-control" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    <script type="text/javascript">
                                        $(function () {
                                            $('#fechapicker').datetimepicker();
                                        });
                                    </script>
                                </div>
                                <div class="control-group">
                                    <label>Calificación:</label>
                                    <div class="controls">
                                        <input type="text" class="form-control bfh-number" name="calificacion" data-zeros="true" data-min="5" data-max="25">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Datos del profesor
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="control-group">
                                    <label>Nombre del profesor:</label>
                                    <div class="controls">
                                        <input name="nombreProfesor" type="text" id="nombreProfesor" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Fecha:</label>
                                    <div class='input-group date' id='fechapicker'>
                                        <input type='text' id="fechaProfe" name="fechaProfesor" class="form-control" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    <script type="text/javascript">
                                        $(function () {
                                            $('#fechapicker').datetimepicker();
                                        });
                                    </script>
                                </div>
                                <div class="control-group">
                                    <label>Comentario:</label>
                                    <div class="controls">
                                        <textarea class="form-control" id="comentario" name="comentarioProfesor" placeholder="Escriba aquí su comentario" rows="5"></textarea>
                                        <h6 class="pull-right" id="count_message"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <input class="btn btn-primary" type="submit" value="Registrar" name="btnRegistrar" class="btn btn-info">
                                <a href="<?php echo base_url('student/obtenerStudents') ?>"><button type="button" class="btn btn-success">Atrás</button></a>
                            </div>
                        </div>
                    </form>
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


