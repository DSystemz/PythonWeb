<?php
require_once 'db_connect.php';

session_start();

if(isset($_POST['btn-enviar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$data = mysqli_escape_string($connect, $_POST['date']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
	$sql = "SELECT count(*) as total FROM usuarios WHERE login = '$login'";
	$result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_assoc($result);
	if($row['total'] == 1) {
		$_SESSION['usuario_existe'] = true;
		header('Location: register.php');
		exit;
}
$sqql = "INSERT INTO usuarios (login, data_nascimento, email, senha) VALUES ($nome, $data, $email, $senha, NOW())";

if($connect->query($sqql) === TRUE) {
	$_SESSION['status_cadastro'] =  true;
}

$connect->close();
header('Location: home.php');
endif;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registre-se Gratuitamente</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    	<fieldset>
    		<legend>Registre seus dados.</legend>	
		<input type="text" id="flogin" name="login" placeholder="Nome de Usuário"><br/>
		<input type="date" id="fdate" name="date"><br/>
		<input type="email" id="femail" name="email" placeholder="E-Mail"><br/>
		<input type="password" id="fpass" name="senha" placeholder="Senha"><br/>
		<input type="password" id="confirm" name="pass" placeholder="Digite novamente"><br/>
		<button type="submit" name="btn-enviar">Enviar</button><br/>
		</fieldset>
	</form>
</body>
</html>