<?php
// Processar a operação de deletar após confirmação
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "../servidor.php";

    // Query de Delete
    $sql = "DELETE FROM filme WHERE cod_fil = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Setando as variáveis no preparedStatement
        mysqli_stmt_bind_param($stmt, "i", $param_id_filme);
        
        //Parâmetros
        $param_id_filme = trim($_POST["id"]);
        
        // Tentando executar o statement
        if(mysqli_stmt_execute($stmt)){
          header ("location: dashboard.php");
          exit();
        } else{
            echo "Algo deu errado, por favor tente novamente mais tarde";
        }
    }  

    // Fechar Statement
    mysqli_stmt_close($stmt);
    
    // Fechar Conexão
    mysqli_close($link);
} 
include_once("dashboard-incs/dash-header.php");
include_once("dashboard-incs/dash-menu.php");
?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Deletar Filme</h4>
                      <form class="forms-sample" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Tem certeza que deseja deletar esse registro?</p>
                            <h3 class="display-3 alert">Tem certeza?</h3>
                            <p>
                                <input type="submit" value="Sim" class="btn btn-danger">
                                <a href="dashboard.php" class="btn btn-default">Não</a>
                            </p>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

<?php 
include_once("dashboard-incs/dash-rodape.php");
?>