<?php
session_start();
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
    <center><h3>Editar viagem</h3><center>

    <?php
    
    $id_viagens = filter_input(INPUT_GET, "id_viagens");
        // var_dump($id_viagens);
    //verificar se tem valor no email
    if (!empty($id_viagens)) {
      
      $query_viagens = "SELECT * FROM tab_viagens WHERE id_viagens = '$id_viagens'";
      $resultado_viagens = mysqli_query($conexao,$query_viagens);
      $row_viagens = mysqli_fetch_assoc($resultado_viagens);

      $query_motorista = "SELECT nome FROM tab_motorista,tab_viagens WHERE id_motorista = '$tab_motorista_id_motorista'";
      $resultado_motorista = mysqli_query($conexao,$query_motorista);
      $row_motorista = mysqli_fetch_assoc($resultado_motorista);


 

    ?>
      <!-- inicio do formulario -->
      <div class="container">
            <form name="EnviarAtualizacaoViagem" action="editarviagens.php" method="POST" class="row g-3">

                <div class="col-md-6">
                <label for="idsaida" class="form-label">Data de saída</label>
                <input type="date" id="idsaida" class="form-control" name="data_saida" value="<?php echo $row_viagens['data_saida']; ?>" required>
                </div>

                <div class="col-md-6">
                <label for="idsaida" class="form-label">Hora de saída</label>
                <input type="time" id="idsaida" class="form-control" name="hora_saida" value="<?php echo $row_viagens['hora_saida']; ?>" required>
                </div>

                <div class="col-md-6">
                <label for="idsaida" class="form-label">Data de chegada</label>
                <input type="time" id="idsaida" class="form-control" name="data_chegada"  required>
                </div>

                <div class="col-md-6">
                <label for="idsaida" class="form-label">Hora de chegada</label>
                <input type="time" id="idsaida" class="form-control" name="hora_chegada"  required>
                </div>


                <div class="col-md-6">
                <label for="idmotorista" class="form-label">Motorista </label>
                  <select class="form-select" id="idmotorista" name="tab_motorista_id_motorista">
                  <option selected><?php echo $row_motorista['nome']; ?></option>
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
                  <option selected><?php echo $row_viagens['tab_veiculo_id_veiculo']; ?></option>
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
                    <button type="submit" value="Cadastrar" name="EnviarAtualizacaoViagem" class="btn btn-primary">Cadastrar</button>

                </div>
            </form>
          </div>
          <!-- fim do formulario -->
          <?php

} else {
	echo "<p style='color: #ff0000;'>Erro: perfil não encontrado </p>";

}

?>
        <br><br>



    </body>
</html>
