
<?php

require '../banco/conexao.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
	
	require_once '../control/Usuario.class.php';
	$u = new Usuario;

	$listLogged = $u->logged($_SESSION['idUser']);
	$nomeUser = $listLogged['login'];

} else {
	header("Location: ../view/login.php");
}

?>