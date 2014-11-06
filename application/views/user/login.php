<body>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Iniciar sesión</div>
                </div>     
                <div style="padding-top:30px" class="panel-body" >
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form class="form-horizontal" action="<?php echo base_url('user/authenticate') ?>" method="post" accept-charset="utf-8">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="password">
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

    <!--        <div id="container">
                <h1>Bienvenido a la aplicación</h1>
                <div id="body">
                    <form action="<?php echo base_url('user/authenticate') ?>" method="post" accept-charset="utf-8">
                        <label for="user_name">Username</label>
                        <input  type="text" name="username" value="" placeholder=""> <br/>
                        <label for="password">Password</label>
                        <input type="password" name="password" value="" placeholder=""> <br/>
                        <input class="btn btn-default" type="submit" name="" value="Login">
                    </form>	
                </div>
            </div>-->
</body>
</html>