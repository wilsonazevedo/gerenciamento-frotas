<?php
include('verifica_login.php');
?>
<!DOCTYPE html>

<html lang="pt-br">
    <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

        <title>GERENCIAMENTO DE FROTAS</title>
        <meta charset="utf-8">
    </head>
    <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarLeftAlignExample"
      aria-controls="navbarLeftAlignExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            Veículo
          </a>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="cadastrarveiculo.php">Cadastrar veículo</a>
            </li>
            <li>
              <a class="dropdown-item" href="listarveiculo.php">Listar veículos</a>
            </li>
          </ul>
        </li>
        <!-- Navbar dropdown -->

        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            Motorista
          </a>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="cadastrarmotorista.php">Cadastrar motorista</a>
            </li>
            <li>
              <a class="dropdown-item" href="listarmotorista.php">Listar motoristas</a>
            </li>
          </ul>
        </li>
        <!-- Navbar dropdown -->
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            Viagem
          </a>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="cadastrarviagem.php">Cadastrar viagem</a>
            </li>
            <li>
              <a class="dropdown-item" href="finalizarviagem.php">Finalizar viagem</a>
            </li>
            <li>
              <a class="dropdown-item" href="listarviagem.php">Listar viagens</a>
            </li>
          </ul>
        </li>
        
      </ul>
      </div>
      <!-- Left links -->
    <div class="d-flex align-items-center">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a>Olá, <?php echo $_SESSION['usuario'];?> </a>
        </li>
        <li class="nav-item">
            <a href="logout.php">  Sair</a>
        </li>
      </ul>
    

    </div>
    <!-- Collapsible wrapper -->
    
  </div>
  <!-- Container wrapper -->
</nav>






        



    </body>
</html>
