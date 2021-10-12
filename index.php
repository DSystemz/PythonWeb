<?php  
//requisição
require_once 'db_connect.php';

//sessão
session_start();

//button de enviar
if(isset($_POST['btn-enviar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	if(empty($login) or empty($senha) or empty($email)):
		$erros[] = "<center><h2> Todos os campos devem ser preenchidos! </h2></center>";
	else:
		$sql = "SELECT login and email FROM usuarios WHERE login = '$login' and email = '$email'";
		$resulter = mysqli_query($connect, $sql);
			if(mysqli_num_rows($resulter) > 0):
				$senha = md5($senha);
				$sql = "SELECT * FROM  usuarios WHERE login = '$login' and senha = '$senha' and email = '$email'";
				$resultado = mysqli_query($connect, $sql);
		
				if(mysqli_num_rows($resultado) == 1):
					$dados = mysqli_fetch_array($resultado);
					$_SESSION['logado'] =  true;
					$_SESSION['id_usuario'] = $dados['id'];
					header('Location: home.php');
				else:
					$erros[] = "<center><h2> Usuário ou senha não conferem </h2></center>";
				endif;
			else:
			$erros[] = "<center><h2> Usuário ou Email Inválido </h2></center>";
			endif;
	endif;
endif;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial_scale=1.0">
	<title>Login, Register - DSystem</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<svg viewbox="0 0 100 20">
		<defs>
    <linearGradient id="gradient">
      <stop color="Chartreuse"/>
    </linearGradient>
    <pattern id="wave" x="10" y="-0.5" width="40%" height="90%" patternUnits="userSpaceOnUse">
      <path id="wavePath" d="M-40 9 Q-30 7 -20 9 T0 9 T20 9 T40 9 T60 9 T80 9 T100 9 T120 9 V20 H-40z" mask="url(#mask)" fill="url(#gradient)"> 
        <animateTransform
            attributeName="transform"
            begin="0s"
            dur="1.5s"
            type="translate"
            from="0,0"
            to="40,0"
            repeatCount="indefinite" />
      </path>
    </pattern>
  </defs>
  <text text-anchor="middle" x="50" y="10" font-size="5" fill="Goldenrod" fill-opacity="0.90">Bem vindo a DSystem</text>
  <text text-anchor="middle" x="50" y="10" font-size="5" fill="url(#wave)"  fill-opacity="1">Bem vindo a DSystem</text><br/>
  <text text-anchor="middle" x="50" y="10" font-size="10" fill="url(#wave)"  fill-opacity="1">Registre uma conta ou efetue login caso já seja um membro do nosso fórum!</text><br/>
</svg>
<?php 
if (!empty($erros)):
	foreach($erros as $erro):
		echo $erro;
	endforeach;

endif;
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    	<fieldset>
    		<legend>Preencha todos os campos</legend>
    	<center>
		<input type="text" id="flogin" name="login" placeholder="Login"><br/>	
		<input type="password" id="fsenha" name="senha" placeholder="Senha"><br/>
		<input type="email" id="femail" name="email" placeholder="E-Mail"><br/>
		<button type="submit" id="fsend" name="btn-enviar">Entrar</button>
		<button type="button" name="btn-register"><a href="register.php">Registrar</button></a>
		</center>
		</fieldset>
	</form>
<center>
<img src="https://marquesfernandes.com/wp-content/uploads/2020/08/kwi4bvgzths31.jpg" width="20%"> <img src="https://cio.com.br/wp-content/uploads/2020/10/linguagem-programacao-python-1024x576.jpg" width="20%"> <img src="https://images.hdqwalls.com/download/python-programming-syntax-4k-1s-1920x1080.jpg" width="20%"> <img src="https://images8.alphacoders.com/947/thumb-1920-947346.jpg" width="20%">
</center>
</body >
</html>
