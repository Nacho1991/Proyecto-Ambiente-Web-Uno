
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
                            <form class="form-group" action="<?php echo base_url('career/insert') ?>" method="post" accept-charset="utf-8">
                                <center>
                                    <label>Código: <input placeholder="Cédula" class="form-control input-sm" type="text" name="codigo" /></label>
                                    <label>Nombre: <input placeholder="Nombre de usuario" class="form-control input-sm" type="text" name="nombrecarrera" /></label> 
                                    <input type="submit" value="Registrar" name="btnRegistrar" class="btn btn-info">
                                </center>
                            </form>
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