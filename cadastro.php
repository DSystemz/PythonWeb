<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($connect, trim($_POST['login']));
$data = mysqli_real_escape_string($connect, trim($_POST['date']));
$email = mysqli_real_escape_string($connect, trim($_POST['email']));
$senha = mysqli_real_escape_string($connect, trim(md5($_POST['senha'])));
$pass = mysqli_real_escape_string($connect, trim(md5($_POST['pass'])));

$password = ($senha = $pass)

$sql = "select count(*) as total from usuarios where usuarios" = '$nome';
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: index.php');
	exit;
}

$sqql = "INSERT INTO usuarios (login, data_nascimento, email, senha) VALUES ($nome, $data, $email, $senha, NOW())";

if($connect->query($sqql) === TRUE) {
	$_SESSION['status_cadastro'] =  true;
}

$connect->close();

header('Location: home.php')
?>