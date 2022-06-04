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
    <center><h3>Cadastrar motorista</h3><center>
    
    <?php  

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);

    if (!empty($dados['CadMotorista'])) {
        $query_motorista = "INSERT INTO tab_motorista (nome, cpf, tipo_cnh, validade_cnh) 
        VALUES (:nome, :cpf, :tipo_cnh, :validade_cnh)";
        $cad_motorista = $con->prepare($query_motorista);
        $cad_motorista->bindParam(':nome', $dados['nome']);
        $cad_motorista->bindParam(':cpf', $dados['cpf']);
        $cad_motorista->bindParam(':tipo_cnh', $dados['tipo_cnh']);
        $cad_motorista->bindParam(':validade_cnh', $dados['validade_cnh']);
                
        $cad_motorista->execute();
    

    if($cad_motorista->rowCount()){
      echo "<p style='color: green';>Motorista cadastrado com sucesso!</p><br>";
      
  } else {
      echo "<p style='color: #ff0000';>Erro: motorista não cadastrado!</p><br>";
      
  }}

    ?>

  <div class="container">
        <form name="CadMotorista" action="" method="POST" class="row g-3">

            <div class="col-md-6">
            <label for="idnome" class="form-label">Nome </label>
            <input type="text" id="idnome" class="form-control" name="nome" value="<?php if(isset($dados['nome'])){
              echo $dados['nome'];} ?>" required>
            </div>

            <div class="col-md-6">
            <label for="idcpf" class="form-label">CPF </label>
            <input type="text" id="idcpf" class="form-control" name="cpf" value="<?php if(isset($dados['cpf'])){
              echo $dados['cpf'];} ?>" required>
            </div>

            <div class="col-md-6">
            <label for="idtipocnh" class="form-label">Categoria CNH </label>
              <select class="form-select" id="idtipocnh" name="tipo_cnh" value="<?php if(isset($dados['tipo_cnh'])){
              echo $dados['tipo_cnh'];} ?>">
                <option selected>Selecione uma categoria</option>
                <option value="A">A</option>
                <option value="A/B">A/B</option>
                <option value="A/C">A/C</option>
                <option value="A/D">A/D</option>
                <option value="A/E">A/E</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                
              </select>
            </div>

            <div class="col-md-6">
            <label for="idvalidadecnh" class="form-label">Validade CNH </label>
            <input type="date" id="idvalidadecnh" class="form-control" name="validade_cnh" value="<?php if(isset($dados['validade_cnh'])){
              echo $dados['validade_cnh'];} ?>" required>
            </div>

            

            <div class="col-12">
                <button type="submit" value="Cadastrar" name="CadMotorista" class="btn btn-primary">Cadastrar</button>

            </div>
        </form>
        </div>
        <br><br>



    </body>
</html>
