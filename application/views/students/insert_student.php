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
    <h3 class="page-header">Registrar estudiante</h3>
</center>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">
                <div class="col-md-6">
                    <form class="form-horizontal" action="<?php echo base_url('student/insert') ?>" method="post" accept-charset="utf-8">
                        <center>
                            <fieldset>
                                <legend>Datos del estudiante</legend>
                                <div class="form-group">
                                    <label for="cedula" class="control-label col-md-2">Cédula:</label>
                                    <div class="col-md-6">
                                        <input name="cedula" type="text" id="cedula" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nombre" class="control-label col-md-2">Nombre:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="nombre" name="nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="carrera" class="control-label col-md-2">Carrera:</label>
                                    <div class="col-md-6">
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
                                <div class="form-group">
                                    <label for="habilidades" class="control-label col-md-2">Habilidades:</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="habilidades" id="habilidades">
                                            <?php
                                            if ($skills != NULL) {
                                                foreach ($skills->result()as $row) {
                                                    echo "<option value=$row->id_skills>$row->descripcion</option>";
                                                }
                                            } else {
                                                echo "<option value=0>Sin carreras registradas</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ingles" class="control-label col-md-2">Nivel de ingles:</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="ingles" id="ingles">
                                            <option value="Básico">Básico</option>
                                            <option value="Nivel 1">Nivel 1</option>
                                            <option value="Nivel 2">Nivel 2</option>
                                            <option value="Nivel 3">Nivel 3</option>
                                            <option value="Nivel Avanzado">Nivel Avanzado</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Datos del proyecto</legend>
                                <div class="form-group">
                                    <label for="duracion" class="control-label col-md-2">
                                        Duración:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="duracion" name="duracion" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tecnologias" class="control-label col-md-2">
                                        Tecnologias:</label>
                                    <div class="col-md-6">
                                        <?php
                                        if ($tecnologias != NULL) {
                                            foreach ($tecnologias->result()as $row) {
                                                echo
                                                "<div class=input-group>"
                                                . "<input type=checkbox value=$row->id_tecnologias /> $row->nombre"
                                                . "</div>";
                                            }
                                        } else {
                                            echo "Sin tecnologias registradas";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cursos" class="control-label col-md-2">Cursos:</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="cursos" id="cursos">
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
                                <div class="form-group">
                                    <label for="descripcion" class="control-label col-md-2">
                                        Descripción:</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escriba aquí su descripción" rows="5"></textarea>
                                        <h6 class="pull-right" id="count_message"></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha" class="control-label col-md-2">
                                        Fecha:</label>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class='input-group date' id='fechapicker'>
                                                <input type='text' id="fecha" name="fecha" class="form-control" />
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(function () {
                                                $('#fechapicker').datetimepicker();
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="calificacion" class="control-label col-md-2">
                                        Calificación:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control bfh-number" name="calificacion" data-zeros="true" data-min="5" data-max="25">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Datos del profesor</legend>
                                <div class="form-group">
                                    <label for="nombreProfesor" class="control-label col-md-2">Nombre:</label>
                                    <div class="col-md-6">
                                        <input name="nombreProfesor" type="text" id="nombreProfesor" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="fechaProfe" class="control-label col-md-2">Fecha:</label>
                                    <div class="col-md-6">
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
                                </div>
                                <div class="form-group">
                                    <label for="comentario" class="control-label col-md-2">
                                        Comentario:</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="comentario" name="comentarioProfesor" placeholder="Escriba aquí su comentario" rows="5"></textarea>
                                        <h6 class="pull-right" id="count_message"></h6>
                                    </div>
                                </div>
                            </fieldset>
                            <input class="btn btn-primary" type="submit" value="Registrar" name="btnRegistrar" class="btn btn-info">
                        </center>
                    </form>
                    <a href="<?php echo base_url('student/obtenerStudents') ?>"><button type="button" class="btn btn-success">Atrás</button></a>
                </div> 
            </div>
        </div>
    </div>
</div>
</body>
</html>


