
<?php

if (isset($_POST['nomeUsuario']) && !empty($_POST['nomeUsuario']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
	
	require '../banco/conexao.php';
	require 'Usuario.class.php';

	$u = new Usuario();

	$nomeUsuario = addslashes($_POST['nomeUsuario']);
	$senha = addslashes($_POST['senha']);

	//$u->login($email, $senha);

	if ($u->login($nomeUsuario, $senha) == true) {
		if (isset($_SESSION['idUser'])) {
			//echo "Acesso concedido!";
			header("Location: ../view/dashboard.php");
		} else {
			header("Location: ../view/erro.php");
		}
	}

} else {
	header("Location: ../view/login.php");
}



?>



