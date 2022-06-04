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

        <title>GERENCIAMENTO DE FROTAS</title>
        <meta charset="utf-8">
        
    </head>
    <body>
    <div id="header"></div>
    <br><br>
    <center><h3>Cadastrar veiculo</h3><center>

    <?php  

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);

    if (!empty($dados['CadVeiculo'])) {
        $query_veiculo = "INSERT INTO tab_veiculo (marca, modelo, ano, placa, chassi, estado)
        VALUES (:marca, :modelo, :ano, :placa, :chassi, :estado)";
        $cad_veiculo = $con->prepare($query_veiculo);
        $cad_veiculo->bindParam(':marca', $dados['marca']);
        $cad_veiculo->bindParam(':modelo', $dados['modelo']);
        $cad_veiculo->bindParam(':ano', $dados['ano']);
        $cad_veiculo->bindParam(':placa', $dados['placa']);
        $cad_veiculo->bindParam(':chassi', $dados['chassi']);
        $cad_veiculo->bindParam(':estado', $dados['estado']);
                  
        $cad_veiculo->execute();
    

    if($cad_veiculo->rowCount()){
      echo "<p style='color: green';>Veiculo cadastrado com sucesso!</p><br>";
      
  } else {
      echo "<p style='color: #ff0000';>Erro: Veiculo não cadastrado!</p><br>";
      
  }}

    ?>

<div class="container">
        <form name="CadVeiculo" action="" method="POST" class="row g-3">

            <div class="col-md-6">
            <label for="idmarca" class="form-label">Marca</label>
            <input type="text" id="idmarca" class="form-control" name="marca" value="<?php if(isset($dados['marca'])){
              echo $dados['marca'];} ?>" required>
            </div>

            <div class="col-md-6">
            <label for="idmodelo" class="form-label">Modelo</label>
            <input type="text" id="idmodelo" class="form-control" name="modelo" value="<?php if(isset($dados['modelo'])){
              echo $dados['modelo'];} ?>" required>
            </div>

            <div class="col-md-6">
            <label for="idano" class="form-label">Ano</label>
            <input type="number" id="idano" class="form-control" name="ano" value="<?php if(isset($dados['ano'])){
              echo $dados['ano'];} ?>" required>
            </div>

            <div class="col-md-6">
            <label for="idplaca" class="form-label">Placa</label>
            <input type="text" id="idplaca" class="form-control" name="placa" value="<?php if(isset($dados['placa'])){
              echo $dados['placa'];} ?>" required>
            </div>

            <div class="col-md-6">
            <label for="idchassi" class="form-label">Chassi</label>
            <input type="text" id="idchassi" class="form-control" name="chassi" value="<?php if(isset($dados['chassi'])){
              echo $dados['chassi'];} ?>" required>
            </div>

            <div class="col-md-6">
            <label for="idestado" class="form-label">Estado do veiculo</label>
              <select class="form-select" id="idestado" name="estado" value="<?php if(isset($dados['estado'])){
              echo $dados['estado'];} ?>" arial-label="Selecione o estado">
                <option selected>Selecione o estado</option>
                <option value="OPERANDO NORMALMENTE">OPERANDO NORMALMENTE</option>
                <option value="INOPERANTE">INOPERANTE</option>
                
                
              </select>
            </div>

                     

            <div class="col-12">
                <button type="submit" value="Cadastrar" name="CadVeiculo" class="btn btn-primary">Cadastrar</button>

            </div>
        </form>
        </div>
        <br><br>



    </body>
</html>
