<?php
require_once "../servidor.php";
 
// Definir variaveis e inicializá-las
$nome ="";
$nome_err = "";
 
// Processando os dados depois que o form é submetido
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validando o nome
    $nome_input = trim($_POST["nome"]);
    if(empty($nome_input)){
        $nome_err = "Por favor insira um nome.";
    } else{
        $nome = $nome_input;
    }
    
    
    // Verificar se existem erros de input antes de inserir no banco de dados
    if(empty($nome_err)) {
        // Query de insert no banco
        $sql = "INSERT INTO genero (nome_gen, usuario_gen) VALUES (?, ?)";
          
          if($stmt = mysqli_prepare($link, $sql)){
              // Setando as variáveis no prepareStatement
              mysqli_stmt_bind_param($stmt, "ss", $param_nome, $param_usuario);
              
              // Parâmetros
              $param_nome = $nome;
              session_start();
              $param_usuario = $_SESSION['id'];
              
              // Tentando executar o statement
              if(mysqli_stmt_execute($stmt)){
                  // Dados inseridos, voltar para tela de Dashboard
                  header("location: dashboard.php");
                  exit();
              } else{
                  echo "Algo deu errado, por favor tente novamente mais tarde";
              }
          }
        
        // Fechar statement
        mysqli_stmt_close($stmt);
    }
    
    // Fechar conexão
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
                      <h4 class="card-title">Cadastrar Gênero</h4>
                      <form class="forms-sample" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group" <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>>
                          <label for="nomeGenero">Nome</label>
                          <input type="text" class="form-control" id="nomeGenero" name="nome" placeholder="Informe o gênero" value="<?php echo $nome; ?>">
                          <span class="help-block"><?php echo $nome_err;?></span>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Enviar</button>
                        <button class="btn btn-light">Voltar</button>
                      </form>
                    </div>
                  </div>
                </div>

<?php 
include_once("dashboard-incs/dash-rodape.php");
?>