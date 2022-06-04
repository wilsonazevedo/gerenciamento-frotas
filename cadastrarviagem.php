<?php
include_once './conexao.php';
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
    <center><h3>Cadastrar viagem</h3><center>
    

    <?php  
      
      $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      //var_dump($dados);

      if (!empty($dados['CadViagem'])) {
          $query_viagem = "INSERT INTO tab_viagens (id_viagens, data_saida, hora_saida, data_chegada, hora_chegada, tab_motorista_id_motorista, tab_veiculo_id_veiculo, tab_usuario_id_usuario)
          VALUES (NULL, :data_saida, :hora_saida, NULL, NULL, :tab_motorista_id_motorista, :tab_veiculo_id_veiculo, 1)";
          $cad_viagem = $con->prepare($query_viagem);
          $cad_viagem->bindParam(':data_saida', $dados['data_saida']);
          $cad_viagem->bindParam(':hora_saida', $dados['hora_saida']);
          $cad_viagem->bindParam(':tab_motorista_id_motorista', $dados['tab_motorista_id_motorista']);
          $cad_viagem->bindParam(':tab_veiculo_id_veiculo', $dados['tab_veiculo_id_veiculo']);
          

                    
          $cad_viagem->execute();


      if($cad_viagem->rowCount()){
        echo "<p style='color: green';>Veiculo cadastrado com sucesso!</p><br>";
        
      } else {
        echo "<p style='color: #ff0000';>Erro: Veiculo não cadastrado!</p><br>";
        
      }}

    ?>




    
 

  <div class="container">
        <form name="CadViagem" action="" method="POST" class="row g-3">

            <div class="col-md-6">
            <label for="idsaida" class="form-label">Data de saída</label>
            <input type="date" id="idsaida" class="form-control" name="data_saida" value="<?php if(isset($dados['data_saida'])){
              echo $dados['data_saida'];} ?>" required>
            </div>

            <div class="col-md-6">
            <label for="idsaida" class="form-label">Hora de saída</label>
            <input type="time" id="idsaida" class="form-control" name="hora_saida" value="<?php if(isset($dados['hora_saida'])){
              echo $dados['data_saida'];} ?>" required>
            </div>


            <div class="col-md-6">
            <label for="idmotorista" class="form-label">Motorista </label>
              <select class="form-select" id="idmotorista" name="tab_motorista_id_motorista">
              <option selected>Selecione um motorista</option>
              <?php
                $query_cad_viagem = "SELECT * FROM tab_motorista ORDER BY nome";
                $resultado_cad_viagem = mysqli_query($conexao, $query_cad_viagem);
                while ($valor_registro=mysqli_fetch_row($resultado_cad_viagem)){
                  $valor_id_motorista=$valor_registro[0];
                  $valor_nome_motorista=$valor_registro[1];
                  echo "<option value=$valor_id_motorista>$valor_nome_motorista</option>";} 
              ?>
                
              </select>
            </div>

            <div class="col-md-6">
            <label for="idveiculo" class="form-label">Veículo </label>
              <select class="form-select" id="idveiculo" name="tab_veiculo_id_veiculo">
              <option selected>Selecione um veículo</option>
              <?php
                $query_cad_veiculo = "SELECT * FROM tab_veiculo ORDER BY placa";
                $resultado_cad_veiculo = mysqli_query($conexao, $query_cad_veiculo);
                while ($valor_registro=mysqli_fetch_row($resultado_cad_veiculo)){
                  $valor_id_veiculo=$valor_registro[0];
                  $valor_placa_veiculo=$valor_registro[4];
                  echo "<option value=$valor_id_veiculo>$valor_placa_veiculo</option>";} 
              ?>
                
              </select>
            </div>

            

            <div class="col-12">
                <button type="submit" value="Cadastrar" name="CadViagem" class="btn btn-primary">Cadastrar</button>

            </div>
        </form>
        </div>
        <br><br>



    </body>
</html>
