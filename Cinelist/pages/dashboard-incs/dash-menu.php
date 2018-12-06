

<body>
  <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <?php
            session_start(); 
            if ($_SESSION['usuario']){
              echo "Bem vindo,".$_SESSION['usuario']."!";
            }
      ?>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- Sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-video-camera"></i>
              <span class="menu-title">Gerenciar Filmes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../pages/cadastroFilme.php">Cadastrar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../pages/listarFilme.php">Listar</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-genero" aria-expanded="false" aria-controls="ui-genero">
              <i class="menu-icon fa fa-star-o"></i>
              <span class="menu-title">Gerenciar Gêneros</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-genero">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../pages/cadastroGenero.php">Cadastrar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../pages/listarGenero.php">Listar</a>
                </li>
              </ul>
            </div>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-diretor" aria-expanded="false" aria-controls="ui-diretor">
              <i class="menu-icon fa fa-star"></i>
              <span class="menu-title">Gerenciar Diretores</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-diretor">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../pages/cadastroDiretor.php">Cadastrar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../pages/listarDiretor.php">Listar</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-critica" aria-expanded="false" aria-controls="ui-critica">
              <i class="menu-icon fa fa-exclamation"></i>
              <span class="menu-title">Gerenciar Críticas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-critica">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../pages/cadastroCritica.php">Cadastrar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../pages/listarCritica.php">Listar</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <form action="dashboard-incs/logout.php" method="post">
                <button class="btn btn-default fa fa-power-off" type="submit">Sair do Sistema</button>
              </form>
            </a>
          </li>
        
        </ul>
      </nav>
      