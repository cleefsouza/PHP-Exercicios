<?php
// Include config file
require_once "../servidor.php";
 
// Define variables and initialize with empty values
$descricao = "";
$descricao_err = "";
 
// Processando os dados depois que o form é submetido
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Pegando o valor do input hidden
    $id = $_POST["id"];

    //Validando a descrição
    $descricao_input = trim($_POST["descricao"]);
    if(empty($descricao_input)){
        $descricao_err = "Por favor insira uma descrição.";
    }else{
        $descricao = $descricao_input;
    }
    
    $nota = $_POST["nota"];

    // Verificar se existem erros de input antes de inserir no banco de dados
    if(empty($nome_err) && empty($descricao_err)){
        // Query de Update
        $sql = "UPDATE critica 
        SET descricao_cri=?, nota_cri=?
        WHERE cod_cri=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Setando as variáveis no prepareStatement
            mysqli_stmt_bind_param($stmt, "sss", $param_descricao, $param_nota, $param_critica);
            
            // Parâmetros
            $param_descricao = $descricao;
            $param_nota = $nota;
            $param_critica = $id;
            
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
        $sql = "SELECT * FROM critica WHERE cod_cri = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Setando as variáveis no prepareStatement
            mysqli_stmt_bind_param($stmt, "s", $param_cod_cri);
            
            // Parâmetros
            $param_cod_cri = $id;
            
            // Tentando executar o statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Jogando o resultado no array */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Pegando o valor no array que contenha a coluna nome_dir
                    $descricao = $row["descricao_cri"];
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
                      <h4 class="card-title">Editar Crítica</h4>
                      <form class="forms-sample" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                      <div class="form-group" <?php echo (!empty($descricao_err)) ? 'has-error' : ''; ?>>
                            <label for="descCritica">Crítica</label>
                            <textarea class="form-control" id="descCritica" name="descricao" rows="2"><?php echo $descricao ?></textarea>
                            <span class="help-block"><?php echo $descricao_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="nota">Nota</label>
                            <select class="form-control" id="nota" name="nota">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-success mr-2">Enviar</button>
                        <button class="btn btn-light">Voltar</button>
                      </form>
                    </div>
                  </div>
                </div>

<?php 
include_once("dashboard-incs/dash-rodape.php");
?>