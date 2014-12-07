<header class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Universidad Técnica Nacional</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo base_url('user/authenticate') ?>">Iniciar sesión</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</header>
<!-- Principal -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Right -->
            <strong><span class="glyphicon glyphicon-dashboard"></span> Detalles del estudiante</strong>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Datos del estudiante
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php
                            foreach ($estudiante->result()as $row) {
                                echo
                                "<div class=control-group>
                                        <label>N° registro:</label> 
                                            <div class=controls>
                                                <input class=form-control readonly= type=text value={$row->id_estudiante} name=id />
                                            </div>             
                                    </div>
                                    <div class=control-group>
                                        <label>Cédula:</label>
                                            <div class=controls>
                                                <input class=form-control type=text value={$row->cedula} name=cedula readonly= />
                                            </div>
                                    </div>
                                    <div class=control-group>
                                        <label>Nombre:</label>
                                        <div class=controls>
                                            <input class=form-control type=text value={$row->nombre} name=nombre readonly= />   
                                        </div>
                                    </div> 
                                    <div class=control-group>
                                        <label>Carrera:</label>
                                        <div class=controls>
                                            <input class=form-control typetext name=carrera value={$row->carrera_fk} readonly= />
                                        </div>
                                    </div>
                                    <div class=control-group>
                                        <label>Nivel de ingles:</label>
                                        <div class=controls>
                                            <input class=form-control type=text name=ingles value={$row->nivel_ingles} readonly= />
                                        </div>
                                    </div>
                                    <div class=control-group>
                                        <label>Habilidades:</label>
                                        <div>
                                            <input class=form-control type=text name=habilidades value={$row->skill_fk} readonly= />
                                        </div>
                                    </div>";
                            }
                            ?>
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
                            <center>
                                <a href="../resultados"><button type="button" class="btn btn-success">Atrás</button></a>
                            </center>
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


