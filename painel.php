<?php
include('verifica_login.php');
?>
<!DOCTYPE html>

<html lang="pt-br">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script>
         $(function () {
            $("#header").load("header.php");
            $("#footer").load("footer.html");
         });
      </script>

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
    <div id="header"></div>
    <br><br>     
    <center><h3>Bem-vindo administrador!</h3><center>

    <p>Para cadastrar mais administradores do sistema, clique no botão abaixo</p>
    
    <a href="cadastrar.php" class="btn btn-primary" role="button">Cadastrar administrador</a>

    
        



    </body>
</html>
