


<?php
  include '../banco/conexao.php';
  $conectar = getConnection();
?>

<?php

if ($_POST['enviar']) {

    //Receber os dados do formulário
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $num = $_POST['num'];
    $autor = $_POST['autor'];
    $ilust = $_POST['ilust'];
    $editora = $_POST['ed']; 
    $nome_imagem = $_FILES['enviar_arquivo']['name'];
   
    //Diretório onde o arquivo vai ser salvo
    $diretorio = '../uploads/';
    $endereco = $diretorio . $nome_imagem;

    //Inserir no BD
    $sql = 'INSERT INTO hq (nome, ano, numdserie, autor,ilust,editora,imagem,endereco) VALUES (:nome, :ano, :numdserie, :autor, :ilust, :editora,
     :imagem, :endereco)';
    $consulta = $conectar->prepare($sql);
    $consulta->bindParam(':nome', $nome);
    $consulta->bindParam(':ano', $ano);
    $consulta->bindParam(':numdserie', $num);    +-
    $consulta->bindParam(':autor', $autor);
    $consulta->bindParam(':ilust', $ilust);
    $consulta->bindParam(':editora', $editora);
    $consulta->bindParam(':imagem', $nome_imagem);
    $consulta->bindParam(':endereco', $endereco);

    //Verificar se os dados foram inseridos com sucesso
    if ($consulta->execute()) {

        if(move_uploaded_file($_FILES['enviar_arquivo']['tmp_name'], $diretorio.$nome_imagem)){
            header("Location: ../view/tela_listagem.php");
        }else{
            header("Location: ../view/tela_listagem.php");
        }        
    } else {
        header("Location: ../view/tela_listagem.php");
    }
/* Fecha 1º IF */ } else {
    header("Location: ../view/tela_listagem.php");
}

?>
