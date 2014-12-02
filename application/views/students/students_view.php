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
                <li><a href="<?php echo base_url('user/index') ?>" class="tip-top">Dashboard</a></li>
                <li><a href="<?php echo base_url('career/obtenerCarreras') ?>" class="tip-top">Carreras</a></li>
                <li class="active"><a href="<?php echo base_url('student/obtenerStudents') ?>" class="tip-top">Estudiantes</a></li>
                <li><a href="<?php echo base_url('user/obtenerUsers') ?>" class="tip-top">Usuarios</a></li>

            </ul>
            <div id="my-tab-content" class="tab-content">

                <!--Tab de estudiantes!-->

                <div class="tab-pane active" id="estudiantes">
                    <center>
                        <h3 class="page-header">Estudiantes</h3>
                    </center>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a href="../student/detallesInsertar"><button class="btn btn-primary">Nuevo</button></a>
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div id="divLista" class="container"> 
                                    <div class="row"> 
                                        <div class="col-xs-12"> 
                                            <div class="table-responsive"> 
                                                <table id="tblTablaCarreras" class="table table table-hover table-bordered table-striped table-condensed"> 
                                                    <thead> 
                                                        <tr class="bg-success"> 
                                                            <th>N° registro</th> 
                                                            <th>Cédula</th> 
                                                            <th>Nombre</th> 
                                                            <th>Carrera</th> 
                                                            <th>Nivel de inglés</th>
                                                            <th>Habilidades</th>
                                                            <th>N° proyectos asociados</th>
                                                            <th>Opciones</th>
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        <?php
                                                        if ($estudiantes != NULL) {
                                                            foreach ($estudiantes->result()as $row) {
                                                                echo
                                                                "<tr>
                                                                    <td>{$row->id_estudiante}</td>
                                                                    <td>{$row->cedula}</td>
                                                                    <td>{$row->nombre}</td>
                                                                    <td>{$row->carrera_fk}</td>
                                                                    <td>{$row->nivel_ingles}</td>
                                                                    <td>{$row->skill_fk}</td>
                                                                        <td><a href= >6</a></td>
                                                                    <td> 
                                                                    <a href= ><button type=button>Asociar_proyecto</button></a>
                                                                         <a href=../student/detallesEliminar/{$row->id_estudiante}><button class=btn-danger type=button>Eliminar</button></a>
                                                                         <a href=../student/detallesModificar/{$row->id_estudiante}><button class=btn-success type=button>Modificar</button></a>
                                                                         <a href=../student/detalles/{$row->id_estudiante}><button class=btn-info type=button>Detalles</button></a>
                                                                    </td>
                                                                </tr>";
                                                            }
                                                        } else {
                                                            echo"<tr>
                                                                 <td colspan=7 align=center>
                                                                    No hay registros
                                                                    </td>
                                                                </tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table> 
                                            </div> 
                                        </div> 
                                    </div> 
                                </div>

                                <!--Este modelo se encarga de registrar a los estudiantes en la base de datos!-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>