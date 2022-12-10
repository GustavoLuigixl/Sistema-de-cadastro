
<?php
    include '../banco/conexao.php';
    $conectar = getConnection();
?>

<?php
    // pega o ID da URL
    $id = $_GET["id"];

    // QUERY para recuperar as informacoes do usuario
        $sql = "SELECT imagem FROM hq WHERE id=:id";
        $consulta = $conectar->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        $num_linhas=$consulta->rowCount();

        if ($num_linhas != 0) {
            // remove do banco
    $sql_deleta = "DELETE FROM hq WHERE id = :id";
    $remove_usuario = $conectar->prepare($sql_deleta);
    $remove_usuario->bindParam(':id', $id, PDO::PARAM_INT);
     
    if ($remove_usuario->execute()){ 
        $dados_usuario = $consulta->fetch(PDO::FETCH_ASSOC);
        //extract($dados_usuario);

        if (!empty($dados_usuario['imagem'])){
            $arquivo = $dados_usuario['imagem'];
            $imagem = "../uploads/".$arquivo;

            if (file_exists($imagem)) {
                unlink($imagem);
            }

        }

            header('Location: ../view/tela_listagem.php');
    } else {
            echo "Erro ao remover";
            print_r(errorInfo());
            //print_r($remove_usuario->errorInfo());
    }       
} else {

            echo "Erro ao remover";
            print_r(errorInfo());
            //print_r($remove_usuario->errorInfo());
}

     
    ?>
