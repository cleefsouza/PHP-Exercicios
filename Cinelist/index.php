<?php
//Iniciando a sessão
session_start();
 
// Verifica se o usuário já está login, se sim, redireciona para a página principal
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: pages/dashboard.php");
    exit;
}
 
// Incluir o arquivo de configuração
require_once "servidor.php";
 
// Definir variaveis e e inicializá-las
$usuario = $senha = "";
$usuario_err = $senha_err = "";
 
// Processando os dados do formulário quando o submit for pressionado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Verificar se o usuário está vazio
    if(empty(trim($_POST["usuario"]))){
        $usuario_err = "Por favor informe um usuário.";
    } else{
        $usuario = trim($_POST["usuario"]);
    }
    
    // Verificar se a senha está vazia
    if(empty(trim($_POST["senha"]))){
        $senha_err = "Por favor insira sua senha.";
    } else{
        $senha = trim($_POST["senha"]);
    }
    
    // Validar credenciais
    if(empty($usuario_err) && empty($senha_err)){
        // Query de select do banco de dados
        $sql = "SELECT cod_usu, nome_usu, senha_usu FROM usuario WHERE nome_usu = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Setando as variáveis no prepareStatement
            mysqli_stmt_bind_param($stmt, "s", $param_usuario);
            
            // Parametros
            $param_usuario = $usuario;
            
            // Tentar executar o statement
            if(mysqli_stmt_execute($stmt)){
                // Guardar o resultado
                mysqli_stmt_store_result($stmt);
                
                // Verificar se o usuário existe, se sim, verificar senha
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Juntando os resultados
                    mysqli_stmt_bind_result($stmt, $id, $usuario, $senha_hash);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($senha, $senha_hash)){
                            // Senha correta, iniciar nova sessão
                            session_start();
                            
                            // Guardar os dados na sessão
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["usuario"] = $usuario;                            
                            
                            // Redirecionar o usuário para a página principal
                            header("location: pages/dashboard.php");
                        } else{
                            // Informar erro se a senha não estiver correta
                            $senha_err = "A senha que você inseriu não é válida.";
                        }
                    }
                } else{
                    // Informar erro se o usuário não existe
                    $usuario_err = "Nenhuma conta encontrada com o usuário informado.";
                }
            } else{
                echo "Algo deu errado, por favor tente novamente mais tarde.";
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
      <div class="content-wrapper d-flex align-items-center login login-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center display-1 text-white">CineList</h2>
            <div class="auto-form-wrapper">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group" <?php echo (!empty($usuario_err)) ? 'has-error' : ''; ?>>
                  <label class="label">Usuário</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Usuário" name="usuario" value="<?php echo $usuario; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-users"></i>
                      </span>
                    </div>
                  </div>
                  <span class="help-block"><?php echo $usuario_err; ?></span>
                </div>
                <div class="form-group" <?php echo (!empty($senha_err)) ? 'has-error' : ''; ?>>
                  <label class="label">Senha</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" name="senha">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-key"></i>
                      </span>
                    </div>
                  </div>
                  <span class="help-block"><?php echo $senha_err; ?></span>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Entrar</button>
                </div>
              
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Não é um membro?</span>
                  <a href="registro.php" class="text-black text-small">Crie uma nova conta</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper-->
    </div>
    <!-- page-body-wrapper -->
  </div>
  <!-- container-scroller -->
</body>

</html>
