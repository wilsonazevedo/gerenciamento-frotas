<?php
session_start();
//include('conexao.php');
$conexao = mysqli_connect('localhost', 'gerenciamentZevD', 'NfHPe8GjVBo96Av5WTMJ0zc4', 'gerenciamento_especialista_shop_qf1WuvpU') or die ('Não foi possível conectar');
 
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
 
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
 
$query = "select usuario from tab_usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";
 
$result = mysqli_query($conexao, $query);
 
$row = mysqli_num_rows($result);
 
if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}