<?php
require_once "../servidor.php";
 
// Definir variaveis e inicializá-las
$descricao =  "";
$descricao_err =  "";
 
// Processando os dados depois que o form é submetido
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Validando descrição
    $descricao_input = trim($_POST["descricao"]);
    if(empty($descricao_input)){
      $descricao_err = "Por favor insira uma descrição.";
    }else{
      $descricao = $descricao_input;
    }

    $filme = $_POST["filme"];
    $nota = $_POST["nota"];
    
    
    // Verificar se existem erros de input antes de inserir no banco de dados
    if(empty($nome_err)) {
        // Query de insert no banco
        $sql = "INSERT INTO critica (descricao_cri, filme_cri, nota_cri, usuario_cri )
        VALUES (?,?,?,?)";
          
          if($stmt = mysqli_prepare($link, $sql)){
              // Setando as variáveis no prepareStatement
              mysqli_stmt_bind_param($stmt, "ssss", $param_descricao, $param_filme, $param_nota, $param_usuario);
              
              // Parâmetros
              $param_descricao = $descricao;
              $param_filme = $filme;
              $param_nota = $nota;
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
                      <h4 class="card-title">Cadastrar Crítica</h4>
                      <form class="forms-sample" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <div class="form-group" <?php echo (!empty($descricao_err)) ? 'has-error' : ''; ?>>
                            <label for="descCritica">Descrição</label>
                            <textarea class="form-control" id="descCritica" name="descricao" rows="2"></textarea>
                            <span class="help-block"><?php echo $descricao_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="filme">Filme</label>
                            <select class="form-control" id="filme" name="filme">
                            <?php 
                              $sql = "SELECT nome_fil, cod_fil FROM filme";
                              if($result = mysqli_query($link, $sql)){
                                if(mysqli_num_rows($result)> 0){
                                  while($row = mysqli_fetch_array($result)){
                                    echo "<option value=".$row["cod_fil"].">".$row["nome_fil"]."</option>";
                                  }
                                  mysqli_free_result($result);
                                }
                              }
                            ?>
                            </select>
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
                        <button type="submit" class="btn btn-success mr-2">Enviar</button>
                        <button class="btn btn-light">Voltar</button>
                      </form>
                    </div>
                  </div>
                </div>

<?php 
include_once("dashboard-incs/dash-rodape.php");
?>