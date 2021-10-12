<?php 

require_once 'db_connect.php';

session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - Bem Vindo</title>
</head>
<body>
<h4>Olá <?php echo $_SESSION['id_usuario'];?></h4>
</body>
</html>