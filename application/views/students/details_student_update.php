
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
    <h3 class="page-header">Actualizar estudiante</h3>
</center>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div id="divLista" class="container"> 
                <form action="<?php echo base_url('student/actualizar') ?>" method="post" accept-charset="utf-8">
                    <fieldset>
                        <legend>Datos del estudiante</legend>
                        <?php
                        if ($detalles != null) {
                            foreach ($detalles->result()as $row) {
                                echo "<label>N° registro:<input class=form-control type=text name=id value={$row->id_estudiante} readonly= /></label>"
                                . "<label>Cedula:<input class=form-control type=text name=cedula value={$row->cedula} /></label>"
                                . "<label>Nombre:<input class=form-control type=text name=nombre value={$row->nombre} /></label>";
                            }
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
                    </fieldset>

                    <fieldset>
                        <legend>Comentarios realizados</legend>
                        <div class="container">
                            <div class="table-responsive"> 
                                <table class="table table-striped table-bordered">
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
                                                                    <td>{$row->fecha}</td>
                                                                    <td>{$row->comentario}</td>
                                                                    
                                                                    
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
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Proyectos asociados</legend>
                        <div class="container">
                            <div class="table-responsive"> 
                                <table class="table table-striped table-bordered">
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
                            </div>
                        </div>
                    </fieldset>
                    <input class="btn btn-primary" type="submit" name="btnActualizar" value="Actualizar">
                </form>
                <a href="<?php echo base_url('student/obtenerStudents') ?>"><button type="button" class="btn btn-success">Atrás</button></a>
            </div> 
        </div> 
    </div> 
</div>
</div>
