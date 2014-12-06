<body>
    <header class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Universidad Técnica Nacional</a>
            </div>
        </div><!-- /.container-fluid -->
    </header>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="" method="post" accept-charset="utf-8">
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <div class="panel-title">Tabla de resultados</div>
                            </div>
                            <div class="input-group">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Estudiante</th>
                                            <th>Cursos</th>
                                            <th>Tecnologías</th>
                                            <th>Habilidades</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $ci = &get_instance();
                                        $ci->load->model("search");
                                        if ($resultados === NULL) {
                                            echo "<tr><td>Sin resultados</td></tr>";
                                        } else {
                                            foreach ($resultados->result()as $rowBusqueda) {
                                                $estudiante = $ci->search->obtenerEstudiante($rowBusqueda->estudiante_fk);
                                                foreach ($estudiante->result()as $rowEstudiante) {
                                                    echo
                                                    "<tr><td>{$rowEstudiante->nombre}</td>"
                                                    . "<td>{$rowBusqueda->curso_fk}</td>"
                                                    . "<td>{$rowBusqueda->tecnologias_fk}</td>"
                                                    . "<td>{$rowEstudiante->skill_fk}</td>"
                                                    . "<td>"
                                                    . "<a href=../student/detallesEliminar/{$rowBusqueda->estudiante_fk}>"
                                                    . "<button class=btn-danger type=button>Detalles</button>"
                                                    . "</a>"
                                                    . "</td></tr>";
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!-- /input-group --> 

                            <div class="panel-footer">
                                <a href="<?php echo base_url() ?>buscador/view"><button class="btn btn-default" type="button">Atrás</button></a>
                            </div>
                        </div>  
                    </form>   
                </div>
            </div>
        </div>
    </div>
</body>

