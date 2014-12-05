
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
                    <li><a href="<?php echo base_url('user/authenticate') ?>">Iniciar sesión</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </header>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Buscador</div>
                </div>     
                <div class="panel-body" >
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form class="form-horizontal" action="" method="post" accept-charset="utf-8">
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Buscar</button>
                            </span>
                        </div><!-- /input-group --> 
                    </form>     
                </div>
                <div class="panel-footer">
                    <fieldset>
                        <legend>Opciones de búsqueda</legend>
                        <label>Habilidades: <input type="checkbox"></label>
                    </fieldset>
                </div>
            </div>  
        </div>
    </div>
</body>
</html>
