<?php
	session_start();
	session_destroy();
	if(!isset($_SESSION['etapa_formulario'])){
		$_SESSION['etapa_formulario'] = 0;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Sistema em PHP</title>
</head>
<body>
	<div class="container">

	<?php
		if (isset($_POST['acao_form1'])) {
			$_SESSION['etapa_formulario'] = $_SESSION['etapa_formulario']+1;
			$_SESSION['nome'] = $_POST['nome'];	
			header('location: index.php');
			die();
		}else if (isset($_POST['acao_form2'])) {
			$_SESSION['etapa_formulario'] = $_SESSION['etapa_formulario']+1;
			$_SESSION['email'] = $_POST['email'];	
			header('location: index.php');
			die();
		}

	?>

	<?php
		if (isset($_SESSION['etapa_formulario']) && $_SESSION['etapa_formulario'] == 0){
			# code...
		
	?>

	

	<h1>Bem vindo !</h1>

	<form method="post">
		<input type="text" name="nome" placeholder="Digite o seu nome...">
		<input type="hidden" name="acao_form1">
		<input type="submit" value="Enviar">
	</form>

	<?php } else if (isset($_SESSION['etapa_formulario']) && $_SESSION['etapa_formulario'] == 1){ ?>

	<form method="post">
		<input type="text" name="email" placeholder="Digite o seu email...">
		<input type="hidden" name="acao_form2">
		<input type="submit" value="Enviar">
	</form>

<?php }else{ ?>

	<h2>Parabéns, você chegou ao final do formulário !!!</h2>
	<?php
		echo 'nome: '.$_SESSION['nome'];
		echo '<br>';
		echo 'email: '.$_SESSION['email'];

	?>

<?php }?>
</div>
</body>
</html>