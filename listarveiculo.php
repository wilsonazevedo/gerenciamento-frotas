<?php
include_once './con.php';
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
    <center><h3>Veiculos cadastrados</h3><center>
    
    
    <?php

        $query_veiculo = "SELECT id_veiculo, marca, modelo, ano, placa, chassi, estado
                FROM tab_veiculo";
        $resultado_veiculo = $con->prepare($query_veiculo);
        $resultado_veiculo->execute();  
        

        if (($resultado_veiculo) AND ($resultado_veiculo->rowCount() != 0)){ ?>
            
            <div class="container">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>Veiculo</th>
                    <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

            <?php
            while ($row_veiculo = $resultado_veiculo->fetch(PDO::FETCH_ASSOC)){
                extract($row_veiculo);?>

                    <tr>
                        <td><?php
                
                
                echo "Nome: " . $marca . "<br>";
                echo "Modelo: " . $modelo . "<br>";
                echo "Ano: " . $ano . "<br>";
                echo "Placa: " . $placa . "<br>";
                echo "Chassi: " . $chassi . "<br>";
                echo "Estado: " . $estado . "<br>";
                ?>
                        </td>
                        <td><?php
                        
                        echo "<a href='editar.php?id_veiculo=" . $id_veiculo . "'><img src='img/editar.svg' width='25' height='25'/></a><br><br>";
                        echo "<a href='apagar.php?id_veiculo=" . $id_veiculo . "'><img src='img/excluir.svg' width='25' height='25'/></a><br><br>";
                    }
                    ?>
                    </td>

    </tr>
    </tbody>
    </table>
    </div>
        <?php
        }else{
            echo "<p style='color: #ff0000';>Erro: Nenhum veiculo cadastrado!</p><br>";
        }
        
        ?>
        





    </body>
</html>
