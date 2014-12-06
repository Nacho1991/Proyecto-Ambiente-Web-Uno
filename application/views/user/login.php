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
                    <li><a href="<?php echo base_url('buscador/view') ?>">Ir al buscador</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </header>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Iniciar sesión</div>
                </div>     
                <div style="padding-top:30px" class="panel-body" >
                    <center>
                    <img src="<?php echo base_url();?>Images/Logo.png" class="img-rounded">
                    <br><br>
                    </center>
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form class="form-horizontal" action="<?php echo base_url('user/authenticate') ?>" method="post" accept-charset="utf-8">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="username" value="" placeholder="Nombre de usuario">                                        
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Contraseña">
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <center>
                                    <input type="submit" class="btn btn-success" value="Entrar">
                                </center>
                            </div>
                        </div>   
                    </form>     
                </div>                     
            </div>  
        </div>
    </div>
</body>
</html>