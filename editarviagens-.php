<?php
session_start();
include_once './conexao.php';
include_once './con.php';
include('verifica_login.php');

$id_viagens = filter_input(INPUT_POST, 'id_viagens', FILTER_SANITIZE_NUMBER_INT);
$data_saida = filter_input(INPUT_POST, 'data_saida', FILTER_SANITIZE_STRING);
$hora_saida = filter_input(INPUT_POST, 'hora_saida', FILTER_SANITIZE_STRING);
$data_chegada = filter_input(INPUT_POST, 'data_chegada', FILTER_SANITIZE_STRING);
$hora_chegada = filter_input(INPUT_POST, 'hora_chegada', FILTER_SANITIZE_STRING);

$tab_motorista_id_motorista = filter_input(INPUT_POST, 'tab_motorista_id_motorista', FILTER_SANITIZE_STRING);
$tab_veiculo_id_veiculo = filter_input(INPUT_POST, 'tab_veiculo_id_veiculo', FILTER_SANITIZE_STRING);


$query_viagens = "UPDATE tab_viagens SET data_saida='$data_saida', hora_saida='$hora_saida', data_chegada='$data_chegada', hora_chegada='$hora_chegada', tab_motorista_id_motorista='$tab_motorista_id_motorista', tab_veiculo_id_veiculo='$tab_veiculo_id_veiculo' WHERE id_viagens='$id_viagens' ";
$resultado_viagens = mysqli_query($conexao,$query_viagens);

if(mysqli_affected_row($conexao)){
    $_SESSION['msg'] = "<p style='color: green;'> Viagem editada com sucesso</p>";
    header("Location: listarviagens.php");
}else{
    $_SESSION['msg'] = "<p style='color: red;'> Erro: viagem não editada!</p>";
    header("Location: editarviagens.php?id_viagens=$id_viagens");
}


?>