
<?php
	include '../banco/conexao.php';
	$conectar = getConnection();
?>

<?php
	// pega o ID da URL
	$id = $_GET["id"];
	 
	// remove do banco
	$sql = "DELETE FROM acesso WHERE id_usuario = :id";
	$consulta = $conectar->prepare($sql);
	$consulta->bindParam(':id', $id, PDO::PARAM_INT);
	 
	if ($consulta->execute())
	{	
	    header('Location: ../view/tela_listagem.php');
	}
	else
	{
	    echo "Erro ao remover";
	    print_r($consulta->errorInfo());
	}		
