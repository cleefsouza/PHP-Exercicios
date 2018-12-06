<?php
// Processar a operação de deletar após confirmação
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "../servidor.php";

    // Query de Delete
    $sql_critica = "DELETE FROM critica WHERE filme_cri in (select filme.cod_fil from filme where filme.diretor_fil = ?)";
    $sql_filme = "DELETE FROM filme WHERE diretor_fil = ?";
    $sql_diretor = "DELETE FROM diretor where cod_dir = ?";
    if($stmt = mysqli_prepare($link, $sql_critica)){
        // Setando as variáveis no preparedStatement
        mysqli_stmt_bind_param($stmt, "i", $param_id_critica);
        
        //Parâmetros
        $param_id_critica = trim($_POST["id"]);
        
        // Tentando executar o statement
        if(mysqli_stmt_execute($stmt)){
           
        } else{
            echo "Algo deu errado, por favor tente novamente mais tarde";
        }
    }
    
    if($stmt = mysqli_prepare($link, $sql_filme)){
      mysqli_stmt_bind_param($stmt, "i", $param_id_filme);

      $param_id_filme = trim($_POST["id"]);

      if(mysqli_stmt_execute($stmt)){

      }else{
        echo "Algo deu errado, por favor tente novamente mais tarde";
      }
    }

    if($stmt = mysqli_prepare($link, $sql_diretor)){
      mysqli_stmt_bind_param($stmt, "i", $param_id_diretor);
      $param_id_diretor = trim($_POST["id"]);
      if(mysqli_stmt_execute($stmt)){
        header("location: dashboard.php");
        exit();
      }else{
        echo "Algo deu errado por favor tente novamente mais";
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
                      <h4 class="card-title">Deletar Diretor</h4>
                      <form class="forms-sample" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Tem certeza que deseja deletar esse registro?</p>
                            <h3 class="display-3 alert">Tem certeza? Se deletar esse diretor, TODOS os filmes e TODAS as críticas serão removidas deste diretor.</h3>
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