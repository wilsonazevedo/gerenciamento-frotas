<?php
include_once './con.php';
include('verifica_login.php');
?>
<!DOCTYPE html>

<html lang="pt-br">
    <head>
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

  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>GERENCIAMENTO DE FROTAS</title>
        <meta charset="utf-8">
        
    </head>
    <body>
    <div id="header"></div>
    <br><br>
    <center><h3>Cadastrar administrador</h3><center>
    
    <?php  

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);

    if (!empty($dados['CadAdmin'])) {
        $query_motorista = "INSERT INTO tab_usuario (usuario,senha) 
        VALUES (:usuario, md5(:senha))";
        $cad_motorista = $con->prepare($query_motorista);
        $cad_motorista->bindParam(':usuario', $dados['usuario']);
        $cad_motorista->bindParam(':senha', $dados['senha']);
                
        $cad_motorista->execute();
    

    if($cad_motorista->rowCount()){
      echo "<p style='color: green';>Administrador cadastrado com sucesso!</p><br>";
      
  } else {
      echo "<p style='color: #ff0000';>Erro: Administrador não cadastrado!</p><br>";
      
  }}

    ?>

  <div class="container">
        <form name="CadAdmin" action="" method="POST" class="row g-3">

            <div class="input-group input-group-lg col-md-2">
            <span class="input-group-text" id="usuario">Usuário</span>
            <input type="text" id="usuario" class="form-control" name="usuario" value="<?php if(isset($dados['usuario'])){
              echo $dados['usuario'];} ?>" required>
            </div>

            <div class="input-group input-group-lg col-md-2">
            <span class="input-group-text" id="senha">Senha</span>
            <input type="password" id="senha" class="form-control" name="senha" value="<?php if(isset($dados['senha'])){
              echo $dados['senha'];} ?>" required>
            </div>



            

            <div class="col-12">
                <button type="submit" value="Cadastrar" name="CadAdmin" class="btn btn-primary">Cadastrar</button>

            </div>
        </form>
        </div>
        <br><br>



    </body>
</html>
