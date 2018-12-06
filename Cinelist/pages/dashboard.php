<?php 
  include_once("dashboard-incs/dash-header.php");
  include_once("dashboard-incs/dash-menu.php");
?>
      <!-- Conteudo-->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Últimos Filmes Adicionados</h4>
                    <p class="card-description">
                      
                    </p>
                    <div class="table-responsive">
                    <?php
                    // Incluir o arquivo de configuração
                    require_once "../servidor.php";
                    
                    // Query de select de filmes
                    $sql = "SELECT *
                            FROM filme f, genero g, diretor d
                            WHERE f.genero_fil = g.cod_gen AND f.diretor_fil = d.cod_dir AND f.usuario_fil =".$_SESSION['id']."
                            ORDER BY f.cod_fil DESC;";

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Gênero</th>";
                                        echo "<th>Diretor</th>";
                                        echo "<th>Ações</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['cod_fil'] . "</td>";
                                        echo "<td>" . $row['nome_fil'] . "</td>";
                                        echo "<td>" . $row['nome_gen'] . "</td>";
                                        echo "<td>" . $row['nome_dir'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='editarFilme.php?id=". $row['cod_fil'] ."' title='Editar' data-toggle='tooltip'><span class='fa fa-pencil'></span>   </a>";
                                            echo "<a href='deletarFilme.php?id=". $row['cod_fil'] ."' title='Remover' data-toggle='tooltip'><span class='fa fa-trash-o'></span>   </a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Liberar o resultSet
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Nenhum registro encontrado.</em></p>";
                        }
                    } else{
                        echo "ERRO: Não pôde conectar ao banco de dados. $sql. " . mysqli_error($link);
                    }

                    // Fechar Conexão
                    ?>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Últimas Críticas Adicionadas</h4>
                    <p class="card-description">
                      
                    </p>
                    <div class="table-responsive">
                    <?php
                    // Incluir o arquivo de configuração
                    require_once "../servidor.php";
                    
                    // Query de select de críticas
                    $sql = "SELECT *
                            FROM critica c, filme f
                            WHERE c.filme_cri = f.cod_fil AND c.usuario_cri =".$_SESSION['id']."
                            ORDER BY c.cod_cri DESC;";

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Crítica</th>";
                                        echo "<th>Nota</th>";
                                        echo "<th>Ações</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['cod_fil'] . "</td>";
                                        echo "<td>" . $row['nome_fil'] . "</td>";
                                        echo "<td>" . $row['descricao_cri'] . "</td>";
                                        echo "<td>";
                                        for($i = 0; $i < $row['nota_cri']; $i++){
                                            echo "<span class='fa fa-star'></span>";
                                        }
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<a href='editarCritica.php?id=". $row['cod_cri'] ."' title='Editar' data-toggle='tooltip'><span class='fa fa-pencil'></span>   </a>";
                                            echo "<a href='deletarCritica.php?id=". $row['cod_cri'] ."' title='Remover' data-toggle='tooltip'><span class='fa fa-trash-o'></span>   </a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Liberar o resultSet
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Nenhum registro encontrado.</em></p>";
                        }
                    } else{
                        echo "ERRO: Não pôde conectar ao banco de dados. $sql. " . mysqli_error($link);
                    }

                    // Fechar Conexão
                    ?>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Últimos Gêneros Adicionados</h4>
                    <p class="card-description">
                      
                    </p>
                    <div class="table-responsive">
                    <?php
                    
                    // Query de select de generos
                    $sql = "SELECT * 
                    FROM genero
                    WHERE usuario_gen = ".$_SESSION["id"]." 
                    ORDER BY cod_gen DESC";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Ações</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['cod_gen'] . "</td>";
                                        echo "<td><a href='listarPorGenero.php?id=".$row['cod_gen']."'>" . $row['nome_gen'] . "</a></td>";
                                        echo "<td>";
                                            echo "<a href='editarGenero.php?id=". $row['cod_gen'] ."' title='Editar' data-toggle='tooltip'><span class='fa fa-pencil'></span>   </a>";
                                            echo "<a href='deletarGenero.php?id=". $row['cod_gen'] ."' title='Remover' data-toggle='tooltip'><span class='fa fa-trash-o'></span>   </a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Liberar o resultSet
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Nenhum registro encontrado.</em></p>";
                        }
                    } else{
                        echo "ERRO: Não pôde conectar ao banco de dados. $sql. " . mysqli_error($link);
                    }

                    ?>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Últimos Diretores Adicionados</h4>
                    <p class="card-description">
                      
                    </p>
                    <div class="table-responsive">
                    <?php
                    
                    // Query de select de diretores
                    $sql = "SELECT * 
                    FROM diretor 
                    WHERE usuario_dir = ".$_SESSION["id"]."
                    ORDER BY cod_dir DESC";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Ações</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['cod_dir'] . "</td>";
                                        echo "<td><a href='listarPorDiretor.php?id=".$row['cod_dir']."'>" . $row['nome_dir'] . "</a></td>";
                                        echo "<td>";
                                            echo "<a href='editarDiretor.php?id=". $row['cod_dir'] ."' title='Editar' data-toggle='tooltip'><span class='fa fa-pencil'></span>   </a>";
                                            echo "<a href='deletarDiretor.php?id=". $row['cod_dir'] ."' title='Remover' data-toggle='tooltip'><span class='fa fa-trash-o'></span>   </a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Liberar o resultSet
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Nenhum registro encontrado.</em></p>";
                        }
                    } else{
                        echo "ERRO: Não pôde conectar ao banco de dados. $sql. " . mysqli_error($link);
                    }
                    // Fechar conexão
                    mysqli_close($link);
                    ?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper-->
        <!--Rodapé-->
<?php 
include_once("dashboard-incs/dash-rodape.php");
?>