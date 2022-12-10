
<?php	// Botão de SAIR
	session_start();
	unset($_SESSION['idUser']);
	header("Location: ../view/login.php")

?>