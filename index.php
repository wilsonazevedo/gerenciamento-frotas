<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SISTEMA DE GERENCIAMENTO DE FROTAS</title>
  <meta charset="utf-8">
</head>

<body>
  
  <br><br><br><br>

    <center><h3>SISTEMA DE GERENCIAMENTO DE FROTAS</h3><center>

  <div class="container-sm">
  <form action="login.php" method="POST" class="row g-3">

    <div class="input-group input-group-lg col-md-2">
    <span class="input-group-text" id="usuario">Usuário</span>
      <input type="text" id="usuario" class="form-control" name="usuario">
      
    </div>
    <br>
    <div class="input-group input-group-lg col-md-2">
    <span class="input-group-text" id="senha">Senha</span>
      <input type="password" id="senha" class="form-control" name="senha">
    </div>

    <?php
    if (isset($_SESSION['nao_autenticado'])):
    ?>
        <div class="notification is-danger">
        <p style='color: #ff0000';>ERRO: Usuário ou senha inválidos.</p>
        </div>
      <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>
    <div class="col-12">
    <button type="submit" class="btn btn-primary">Entrar</button>
    </div>

  </form>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>