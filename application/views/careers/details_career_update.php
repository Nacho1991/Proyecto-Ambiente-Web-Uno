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
                <li class="active"><a href="<?php echo base_url('career/obtenerCarreras') ?>" class="tip-top">Carreras</a></li>
                <li><a href="<?php echo base_url('student/obtenerStudents') ?>" class="tip-top">Estudiantes</a></li>
                <li><a href="<?php echo base_url('user/obtenerUsers') ?>" class="tip-top">Usuarios</a></li>

            </ul>
            <div id="my-tab-content" class="tab-content">

                <!--Tab de usuarios !-->

                <div class="tab-pane active" id="usuarios">
                    <center>
                        <h3 class="page-header">Registrar carrera</h3>
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
                                                <form action="<?php echo base_url('career/update') ?>" method="post" accept-charset="utf-8">
                                                    <center>
                                                        <?php
                                                        foreach ($detalles->result()as $row) {
                                                            echo
                                                            "
                                                            <label>N° registro: <input class=form-control readonly= type=text value={$row->id_carreras} name=id /></label> 
                                                            <label>Código de la carrera:<input class=form-control typetext value={$row->codigo_carrera} name=codigo /></label>
                                                            <label>Nombre: <input class=form-control type=text value={$row->nombre} name=nombre /></label>";
                                                        }
                                                        ?>
                                                        <input type="submit" class="btn btn-danger" value="Actualizar">
                                                    </center>
                                                </form>
                                                <center>
                                                    <a href="../obtenerCarreras"><button class="btn btn-success">Atrás</button></a>
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
        </div>
    </div>
</body>
</html>