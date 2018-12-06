<?php 
require_once "../servidor.php";
 
// Definir variaveis e inicializá-las
$nome = $descricao = $genero = $diretor =  "";
$nome_err = $descricao_err =  "";
 
// Processando os dados depois que o form é submetido
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validando o nome
    $nome_input = trim($_POST["nome"]);
    if(empty($nome_input)){
        $nome_err = "Por favor insira um nome.";
    } else{
        $nome = $nome_input;
    }

    //Validando descrição
    $descricao_input = trim($_POST["descricao"]);
    if(empty($descricao_input)){
      $descricao_err = "Por favor insira uma descrição.";
    }else{
      $descricao = $descricao_input;
    }

    $diretor = $_POST["diretor"];
    $genero = $_POST["genero"];

    
    
    // Verificar se existem erros de input antes de inserir no banco de dados
    if(empty($nome_err)) {
        // Query de insert no banco
        $sql = "INSERT INTO filme (nome_fil, descricao_fil, genero_fil, diretor_fil, usuario_fil )
        VALUES (?,?,?,?,?)";
          
          if($stmt = mysqli_prepare($link, $sql)){
              // Setando as variáveis no prepareStatement
              mysqli_stmt_bind_param($stmt, "sssss", $param_nome, $param_descricao, $param_genero, $param_diretor, $param_usuario);
              
              // Parâmetros
              $param_nome = $nome;
              $param_descricao = $descricao;
              $param_genero = $genero;
              $param_diretor = $diretor;
              session_start(); 
              if ($_SESSION['id']){
                $param_usuario = $_SESSION['id'];
              }

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
                      <h4 class="card-title">Cadastrar Filme</h4>
                      <form class="forms-sample" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group" <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>>
                          <label for="nomeFilme">Nome</label>
                          <input type="text" class="form-control" id="nomeFilme" name="nome" placeholder="Insira nome do Filme">
                           <span class="help-block"><?php echo $nome_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>>
                            <label for="descFilme">Descrição</label>
                            <textarea class="form-control" id="descFilme" rows="2" name="descricao"></textarea>
                            <span class="help-block"><?php echo $descricao_err;?></span>
                        </div>
                        <div class="form-group">
                            <label for="genero">Gênero</label>
                            <select class="form-control" id="genero" name="genero">
                            <?php 
                                require_once "../servidor.php";
                                $sql = "SELECT nome_gen, cod_gen FROM genero";
                                if($result = mysqli_query($link, $sql)){
                                  if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                      echo "<option value=".$row["cod_gen"].">". $row["nome_gen"] ."</option>";
                                    }
                                    mysqli_free_result($result);
                                  }
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="diretor">Diretor</label>
                            <select class="form-control" id="diretor" name="diretor">
                            <?php
                                $sql = "SELECT nome_dir, cod_dir FROM diretor";
                                if($result = mysqli_query($link, $sql)){
                                  if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                      echo "<option value=".$row["cod_dir"].">". $row["nome_dir"]."</option>";
                                    }
                                    mysqli_free_result($result);
                                  }
                                }
                              ?>
                            </select>
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