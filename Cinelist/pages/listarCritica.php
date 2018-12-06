<?php 
    require_once "../servidor.php";
    // Incluir o arquivo de configuração
    include_once("dashboard-incs/dash-header.php");
    include_once("dashboard-incs/dash-menu.php");

?>

<div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-uppercase">Lista de críticas cadastradas</h4>
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
                            ;";

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Crítica</th>";
                                        echo "<th>Nota</th>";
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


<?php 
include_once("dashboard-incs/dash-rodape.php");
?>

