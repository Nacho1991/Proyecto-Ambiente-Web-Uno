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
            <strong><span class="glyphicon glyphicon-dashboard"></span> Registrar proyecto</strong>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <form class="form-vertical" action="<?php echo base_url('student/insertProyecto') ?>" method="post" accept-charset="utf-8">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Datos del proyecto
                                </div>
                            </div>
                            <div class="panel-body">
                                <fieldset>
                                    <legend><h5>Datos del estudiante</h5></legend>
                                    <?php
                                    foreach ($detalles->result()as $row) {
                                        echo
                                        "<div class=control-group>
                                        <label>N° registro:</label>
                                            <div class=control-group>
                                                <input class=form-control type=text value={$row->id_estudiante} name=id readonly= />
                                            </div>
                                    </div>
                                            <div class=control-group>
                                        <label>Cédula:</label>
                                            <div class=control-group>
                                                <input class=form-control type=text value={$row->cedula} name=cedula readonly= />
                                            </div>
                                    </div>
                                    <div class=control-group>
                                        <label>Nombre:</label>
                                        <div class=control-group>
                                            <input class=form-control type=text value={$row->nombre} name=nombre readonly=/>   
                                        </div>
                                    </div>";
                                    }
                                    ?>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <legend><h5>Datos del proyecto</h5></legend>
                                <div class="control-group">
                                    <label>Duración:</label>
                                    <div class="controls">
                                        <input type="text" id="duracion" name="duracion" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Tecnologías</label>
                                    <div class="controls">
                                        <select class="form-control" id="example-getting-started" name="tecnologias[]" multiple="multiple">
                                            <?php
                                            if ($tecnologias != NULL) {
                                                foreach ($tecnologias->result()as $row) {
                                                    echo
                                                    "<option value=$row->nombre /> $row->nombre";
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
                                        <input type="text" class="form-control bfh-number" name="calificacion" data-zeros="true" data-min="5" data-max="100">
                                    </div>
                                </div>
                                </fieldset>
                            </div>
                            <div class="panel-footer">
                                <input class="btn btn-primary" type="submit" value="Registrar" name="btnRegistrar" class="btn btn-info">
                                <a href="<?php foreach ($detalles->result()as $row){
                                       echo base_url()."student/detallesModificar/$row->id_estudiante/$row->cedula";
                                   }?>"><button type="button" class="btn btn-success">Atrás</button></a>
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