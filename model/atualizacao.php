<?php
	
    include_once '../banco/conexao.php';
  	$conectar = getConnection();
?>

<?php

	if(isset($_POST['editar2'])){
     $id = $_POST['recebeID'];
    

 $pesquisa = "SELECT imagem FROM hq WHERE id=:id";
 $resultado =  $conectar->prepare($pesquisa);
 $resultado->bindParam(':id', $id, PDO:: PARAM_INT);
 $resultado->execute();

 //VERIFICAR SE ENCONTROU O REGISTRO NO BANCO DE DADOS
 if (($resultado) and ($resultado->rowCount() != 0)) {
    $exibir = $resultado->fetch(PDO::FETCH_ASSOC);
 }
/* ----------------------------------------------------------------------*/

    
    $nomee=$_POST['nome2'];
    $ano=$_POST['ano2'];
    $num=$_POST['num2'];
    $autor=$_POST['autor2'];
    $ilust=$_POST['ilust2'];
    $editora=$_POST['ed2'];
    $nome_arquivo=$_FILES['enviar_arquivo']['name'];
    $tmp_arquivo=$_FILES['enviar_arquivo']['tmp_name'];


    $diretorio = '../uploads/';
    $endereco = $diretorio . $nome_arquivo;



    // Verificando os campos se estao preenchidos
    if( empty($nomee) || empty($ano) || empty($num) || empty($autor) || empty($ilust) || empty($editora) ) {
        if(empty($nomee)) {
            echo "<font color='red'>Campo Login Obrigatorio 1.</font><br/>";
        }

        if(empty($ano)) {
            echo "<font color='red'>Campo Senha Obrigatorio 2.</font><br/>";

        }   if(empty($num)) {
            echo "<font color='red'>novo arquivo .  Obrigatorio. 3</font><br/>";
        }
        if(empty($autor)) {
            echo "<font color='red'>novo arquivo .  Obrigatorio. 4</font><br/>";
        }
        if(empty($ilust)) {
            echo "<font color='red'>novo arquivo .  Obrigatorio. 5</font><br/>";
        }
        if(empty($editora)) {
            echo "<font color='red'>novo arquivo .  Obrigatorio. 6</font><br/>";
        }
       

    } else {
        //atualizado dados na tabela
        $sql = "UPDATE hq SET nome = :nomee, ano = :ano, numdserie = :num, autor = :autor, ilust = :ilust, editora = :editora, imagem = :imagem , endereco = :endereco WHERE id = :id";

        $query = $conectar->prepare($sql);

        $query->bindparam(':id', $id);
        $query->bindparam(':nomee', $nomee);
        $query->bindparam(':ano', $ano);
        $query->bindparam(':num', $num);
        $query->bindparam(':autor', $autor);
        $query->bindparam(':ilust', $ilust);
        $query->bindparam(':editora', $editora);
        $query->bindparam(':imagem', $nome_arquivo);
        $query->bindparam(':endereco', $endereco);


        if ($query->execute()){

            if(move_uploaded_file($_FILES['enviar_arquivo']['tmp_name'], $diretorio . $nome_arquivo)){
                $arquivo_anterior = "../uploads/" . $exibir['imagem'];
                if(file_exists($arquivo_anterior)){
                    unlink($arquivo_anterior);
                }
            }
        
            header('Location: ../view/tela_listagem.php');

        }else {
     
      
            echo "<p style='color: #f00;'>Erro: usuario não editado com sucesso!</p>";
            print_r($query->errorInfo());
        }

    }
}
?>
