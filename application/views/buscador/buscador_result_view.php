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
                    <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title">Tabla de resultados</div>
                        </div>
                        
                            <table class="table table-striped">
                                <?php
                                $ci = &get_instance();
                                $ci->load->model("search");
                                if ($resultados == NULL || $resultados == '') {
                                    echo "<label>Sin resultados</label>";
                                } else {
                                    if ($tipoBusqueda === 'habilidades') {
                                        echo
                                        "<thead><tr><th>Estudiante</th>
                                        <th>Carrera</th>
                                        <th>Habilidades</th>
                                        <th>Opciones</th></tr></thead><tbody>";
                                        foreach ($resultados->result()as $rowBusqueda) {
                                            echo
                                            ""
                                            . "<tr><td>{$rowBusqueda->nombre}</td>"
                                            . "<td>{$rowBusqueda->carrera_fk}</td>"
                                            . "<td>{$rowBusqueda->skill_fk}</td>"
                                            . "<td>"
                                            . "<a href=../buscador/detalles/{$rowBusqueda->cedula}>"
                                            . "<button class=btn-danger type=button>Detalles</button>"
                                            . "</a>"
                                            . "</td></tr>";
                                        }
                                        echo "</tbody></table>";
                                    } else if ($tipoBusqueda === 'tecnologia') {
                                        echo
                                        "<thead><tr><th>Estudiante</th>
                                        <th>Cursos</th>
                                        <th>Tecnologías</th>
                                        <th>Opciones</th></tr></thead><tbody>";
                                        foreach ($resultados->result()as $row) {
                                            $estudiante = $ci->search->obtenerEstudiante($row->estudiante_fk);
                                            foreach ($estudiante->result()as $rowEstudiante) {
                                                echo ""
                                                . "<tr><td>{$rowEstudiante->nombre}</td>"
                                                . "<td>{$row->curso_fk}</td>"
                                                . "<td>{$row->tecnologias_fk}</td>"
                                                . "<td>"
                                                . "<a href=../buscador/detalles/{$row->estudiante_fk}>"
                                                . "<button class=btn-danger type=button>Detalles</button>"
                                                . "</a>"
                                                . "</td></tr>";
                                            }
                                        }
                                        echo "</tbody></table>";
                                    }
                                }
                                ?>
                            </table>
                        
                        <div class="panel-footer">
                            <center>
                                <a href="<?php echo base_url() ?>buscador/view"><button class="btn btn-success" type="button">Atrás</button></a>
                            </center>
                        </div>
                    </div>  

                </div>
            </div>
        </div>
    </div>
</body>

