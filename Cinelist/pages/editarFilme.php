<?php
// Include config file
require_once "../servidor.php";
 
// Define variables and initialize with empty values
$nome = $descricao = "";
$nome_err = $descricao_err = "";
 
// Processando os dados depois que o form é submetido
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Pegando o valor do input hidden
    $id = $_POST["id"];

    // Validando o nome
    $nome_input = trim($_POST["nome"]);
    if(empty($nome_input)){
        $nome_err = "Por favor insira um nome.";
    } else{
        $nome = $nome_input;
    }

    //Validando a descrição
    $descricao_input = trim($_POST["descricao"]);
    if(empty($descricao_input)){
        $descricao_err = "Por favor insira uma descrição.";
    }else{
        $descricao = $descricao_input;
    }
    
    // Verificar se existem erros de input antes de inserir no banco de dados
    if(empty($nome_err) && empty($descricao_err)){
        // Query de Update
        $sql = "UPDATE filme 
        SET nome_fil = ?, descricao_fil=?
        WHERE cod_fil=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Setando as variáveis no prepareStatement
            mysqli_stmt_bind_param($stmt, "sss", $param_nome, $param_descricao, $param_filme);
            
            // Parâmetros
            $param_nome = $nome;
            $param_descricao = $descricao;
            $param_filme = $id;
            
            // Tentando executar o Statement
            if(mysqli_stmt_execute($stmt)){
                // Dados inseridos, voltar para tela de Dashboard
                header("location: dashboard.php");
                exit();
            } else{
                echo "Algo deu errado, por favor tente novamente mais tarde.";
            }
        }
         
        // Fechar o Statement
        mysqli_stmt_close($stmt);
    }
    
    // Fechar a conexão
    mysqli_close($link);
} else{
    // Verificar se o ID existe antes de continuar
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Pegar o parâmetro da URL
        $id =  trim($_GET["id"]);
        
        // Query de Select
        $sql = "SELECT * FROM filme WHERE cod_fil = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Setando as variáveis no prepareStatement
            mysqli_stmt_bind_param($stmt, "s", $param_cod_fil);
            
            // Parâmetros
            $param_cod_fil = $id;
            
            // Tentando executar o statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Jogando o resultado no array */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Pegando o valor no array que contenha a coluna nome_dir
                    $nome = $row["nome_fil"];
                    $descricao = $row["descricao_fil"];
                }
                
            } else{
                echo "Algo deu errado, por favor tente novamente mais tarde.";
            }
        }
        
        // Fechar statement
        mysqli_stmt_close($stmt);
        
        // Fechar a conexão
        mysqli_close($link);
    } 
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
                      <h4 class="card-title">Editar Filme</h4>
                      <form class="forms-sample" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                      <div class="form-group" <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>>
                            <label for="nomeFilme">Nome</label>
                            <input type="text" class="form-control" id="nomeGenero" name="nome" placeholder="Informe o gênero" value="<?php echo $nome; ?>">
                          <span class="help-block"><?php echo $nome_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($descricao_err)) ? 'has-error' : ''; ?>>
                            <label for="descFilme">Descrição</label>
                            <textarea class="form-control" id="descFilme" rows="2" name="descricao"><?php echo $descricao?></textarea>
                            <span class="help-block"><?php echo $descricao_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <button type="submit" class="btn btn-success mr-2">Enviar</button>
                        <button class="btn btn-light">Voltar</button>
                      </form>
                    </div>
                  </div>
                </div>

<?php 
include_once("dashboard-incs/dash-rodape.php");
?>