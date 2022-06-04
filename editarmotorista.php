<?php
include_once './con.php';
include_once './conexao.php';
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
    <center><h3>Motoristas cadastrados</h3><center>
    
    
        <?php
        $id_motorista = filter_input(INPUT_GET, "id_motorista", FILTER_SANITIZE_STRING);

        //verificar se tem valor no email
        if (!empty($id_motorista)) {
            //incluir arquivos
            require './con.php';
	        require './funcoes.php';

            //instaciar a classe e criar o objeto
            $visualizar_motorista = new funcoes();

            //receber os dados do formulario
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            //verificar se o usuario clicou no botao e a posicao EnviarAtualizacaoPerfil possui valor
            if (!empty($dados['EnviarAtualizacaoMotorista'])) {
                $editar_motorista = new funcoes();

                //enviar os dados para o atributo dados da classe perfil
                $editar_motorista->dados = $dados;

                //instanciar o metodo editar
                $valor = $editar_motorista->editarmotorista();

                if ($valor) {
                    echo "<p style='color: green;'>Motorista atualizado com sucesso</p>";
                } else {
                    echo "<p style='color: #ff0000;'>Erro: motorista não atualizado</p>";
                }
            }

            //enviar o email para o atributo da classe perfil
            $visualizar_motorista->id_motorista = $id_motorista;

            //instanciar o metodo visualizar
            $resultado_visualizar_motorista = $visualizar_motorista->visualizarmotorista();

            extract($resultado_visualizar_motorista);
        ?>










        <div class="container">
                <form name="EditarMotorista" action="" method="POST" class="row g-3">

                    <div class="col-md-6">
                    <label for="idnome" class="form-label">Nome </label>
                    <input type="text" id="idnome" class="form-control" name="nome" required>
                    </div>

                    <div class="col-md-6">
                    <label for="idcpf" class="form-label">CPF </label>
                    <input type="text" id="idcpf" class="form-control" name="cpf" required>
                    </div>

                    <div class="col-md-6">
                    <label for="idtipocnh" class="form-label">Categoria CNH </label>
                    <select class="form-select" id="idtipocnh" name="tipo_cnh" required>
                    <?php
                        $query_cat = "SELECT * FROM tab_motorista WHERE id_motorista = $id_motorista";
                        $resultado_cat = mysqli_query($conexao, $query_cat);
                        while ($valor_registro=mysqli_fetch_row($resultado_cat)){
                        $valor_id_motorista=$valor_registro[0];
                        $valor_nome_motorista=$valor_registro[3];
                        echo "<option value=$valor_id_motorista>$valor_nome_motorista</option>";} 
                    ?>
                        
                    </select>
                    </div>

                    <div class="col-md-6">
                    <label for="idvalidadecnh" class="form-label">Validade CNH </label>
                    <input type="date" id="idvalidadecnh" class="form-control" name="validade_cnh" required>
                    </div>

                    

                    <div class="col-12">
                        <button type="submit" value="Cadastrar" name="EditarMotorista" class="btn btn-primary">Atualizar</button>

                    </div>
                </form>
                </div>



     
        <?php
        }else{
            echo "<p style='color: #ff0000';>Erro: Nenhum motorista cadastrado!</p><br>";
        }
        
        ?>
        
        





    </body>
</html>
