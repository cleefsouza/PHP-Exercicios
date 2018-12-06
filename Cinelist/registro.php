<?php 

// Incluir arquivo de configuração
require_once "servidor.php";
 
// Definir variaveis e inicializá-las
$usuario = $senha = $confirma_senha = "";
$usuario_err = $senha_err = $confirma_senha_err = "";
 
// Processando os dados do formulário quando o submit for pressionado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  // Validar usuário
  if(empty(trim($_POST["usuario"]))){
      $usuario_err = "Por favor insira um usuário.";
  } else{
      //  // Query de select do banco de dados
      $sql = "SELECT cod_usu FROM usuario WHERE nome_usu = ?";
      
      if($stmt = mysqli_prepare($link, $sql)){
            // Setando as variáveis no prepareStatement
          mysqli_stmt_bind_param($stmt, "s", $param_usuario);
          
          // Parametros
          $param_usuario = trim($_POST["usuario"]);
          
          // Tentar executar o statement
          if(mysqli_stmt_execute($stmt)){
              //Guardando o resultado
              mysqli_stmt_store_result($stmt);
              
              if(mysqli_stmt_num_rows($stmt) == 1){
                  $usuario_err = "Este usuário já existe.";
              } else{
                  $usuario = trim($_POST["usuario"]);
              }
          } else{
              echo "Algo deu errado, tente novamente mais tarde.";
          }
      }
      
      // Fechar statement
      mysqli_stmt_close($stmt);
  }
  
  //Validar a senha
  if(empty(trim($_POST["senha"]))){
      $senha_err = "Por favor insira uma senha.";     
  } elseif(strlen(trim($_POST["senha"])) < 6){
      $senha_err = "A senha deve ter no mínimo 6 caracteres.";
  } else{
      $senha = trim($_POST["senha"]);
  }
  
  // Validar a confirmação da senha
  if(empty(trim($_POST["confirma_senha"]))){
      $confirma_senha_err = "Por favor confirme a senha.";     
  } else{
      $confirma_senha = trim($_POST["confirma_senha"]);
      if(empty($senha_err) && ($senha != $confirma_senha)){
          $confirma_senha_err = "Senhas não conferem.";
      }
  }
  
  // Verificando se existe algum erro antes de inserir no banco de dados
  if(empty($usuario_err) && empty($senha_err) && empty($confirma_senha_err)){
      
      // Query de inserção no banco de dados
      $sql = "INSERT INTO usuario (nome_usu, senha_usu) VALUES (?, ?)";
       
      if($stmt = mysqli_prepare($link, $sql)){
          // Setando as variáveis no prepareStatement
          mysqli_stmt_bind_param($stmt, "ss", $param_usuario, $param_senha);
          
          // Parametros
          $param_usuario = $usuario;
          $param_senha = password_hash($senha, PASSWORD_DEFAULT); // Cria uma senha Hash
          
          // Tentar executar o statement
          if(mysqli_stmt_execute($stmt)){
              // Redirecionar para página de login
              header("location: index.php");
          } else{
              echo "Algo deu errado, por favor tenter novamente mais tarde.";
          }
      }
       
      // Fechar statement
      mysqli_stmt_close($stmt);
  }
  
  // Fechar conexão
  mysqli_close($link);
}

 include("includes/header.php");
?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper login-page">
      <div class="content-wrapper d-flex align-items-center login registro-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center display-1 text-white">CineList</h2>
            <div class="auto-form-wrapper">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group" <?php echo (!empty($usuario_err)) ? 'has-error' : ''; ?>>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Usuário" name="usuario" value="<?php echo $usuario ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-users"></i>
                      </span>
                    </div>
                  </div>
                <span class="help-block"><?php echo $usuario_err; ?></span>
                </div>
                <div class="form-group" <?php echo (!empty($senha_err)) ? 'has-error' : '';?>>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Senha" name="senha" value="<?php echo $senha; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-key"></i>
                      </span>
                    </div>
                  </div>
                  <span class="help-block"><?php echo $senha_err; ?>
                </div>
                <div class="form-group" <?php echo (!empty($confirma_senha_err)) ? 'has-error' : ''; ?>>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirmar Senha" name="confirma_senha" value="<?php echo $confirma_senha; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-key"></i>
                      </span>
                    </div>
                  </div>
                <span class="help-block text-red"><?php echo $confirma_senha_err; ?></span>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit">Registrar</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Já tem uma conta?</span>
                  <a href="index.php" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
</body>

</html>