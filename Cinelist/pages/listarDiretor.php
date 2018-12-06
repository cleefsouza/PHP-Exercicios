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
                    <h4 class="card-title text-uppercase">Lista de diretores cadastrados</h4>
                    <p class="card-description">
                    
                    </p>
                    <div class="table-responsive">
                    <?php
                

                    // Query de select de diretores
                    $sql = "SELECT * 
                    FROM diretor 
                    WHERE usuario_dir = ".$_SESSION["id"]."";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nome</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['cod_dir'] . "</td>";
                                        echo "<td>" . $row['nome_dir'] . "</td>";
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


<?php 
include_once("dashboard-incs/dash-rodape.php");
?>

