
<body>
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
    <form class="form-horizontal" action="<?php echo base_url() ?>buscador/resultados" method="post" accept-charset="utf-8">
        <div class="container">    
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Buscador</div>
                    </div>     
                    <div class="panel-body" >
                        <center>
                            <img src="<?php echo base_url(); ?>Images/Logo.png" class="img-rounded">
                            <br><br>
                        </center>
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <div class="input-group">
                            <input name="filtro" type="text" class="form-control">
                            <span class="input-group-btn">
                                <input class="btn btn-default" type="submit" value="Buscar"/>
                            </span>
                        </div><!-- /input-group --> 
                    </div>
                    <div class="panel-footer">
                        <fieldset>
                            <legend>Opciones de búsqueda</legend>
                            <select class="form-control" id="example-getting-started" name="opcionesBusqueda">
                                <option value="habilidades">Habilidades</option>
                                <option value="tecnologia">Tecnologias</option>
                            </select>
                        </fieldset>
                    </div>
                </div>  
            </div>
        </div>
    </form>  
</body>
</html>
