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
    <center><h3>Motoristas cadastrados</h3><center>
    
    
    <?php

        $query_motorista = "SELECT id_motorista, nome, cpf, tipo_cnh, validade_cnh
                FROM tab_motorista";
        $resultado_motorista = $con->prepare($query_motorista);
        $resultado_motorista->execute();  
        

        if (($resultado_motorista) AND ($resultado_motorista->rowCount() != 0)){ ?>
            
            <div class="container">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>Motorista</th>
                    <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

            <?php
            while ($row_motorista = $resultado_motorista->fetch(PDO::FETCH_ASSOC)){
                extract($row_motorista);?>

                    <tr>
                        <td><?php
                
                
                echo "Nome: " . $nome . "<br>";
                echo "CPF: " . $cpf . "<br>";
                echo "Categoria CNH: " . $tipo_cnh . "<br>";
                echo "Validade CNH: " . date('d/m/Y', strtotime($validade_cnh)) . "<br>";?>
                        </td>
                        <td><?php
                        
                        echo "<a href='editarmotorista.php?id_motorista=" . $id_motorista . "'><img src='img/editar.svg' width='25' height='25'/></a><br><br>";
                        echo "<a href='apagarmotorista.php?id_motorista=" . $id_motorista . "'><img src='img/excluir.svg' width='25' height='25'/></a><br><br>";
                    }
                    ?>
                    </td>

    </tr>
    </tbody>
    </table>
    </div>
        <?php
        }else{
            echo "<p style='color: #ff0000';>Erro: Nenhum motorista cadastrado!</p><br>";
        }
        
        ?>
        





    </body>
</html>
