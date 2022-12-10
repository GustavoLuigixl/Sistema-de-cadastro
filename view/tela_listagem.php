
<?php
	  include_once '../banco/conexao.php';
  	$conectar = getConnection();
?>



<!DOCTYPE html>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      rel="stylesheet">
<html> 
 	<head>
 		<title> DASHBOARD </title>  
 	    <meta charset="utf-8">
		 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
		 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

 	<style>
	body {
	  background-image: url('fundo_login.jpg');
	  background-repeat: no-repeat;
	  background-attachment: fixed;  
	  background-size: cover;	  
	}

	.caixalogin{
		background-color: white;
		opacity: 80%;
		width: 300px;
		height: 250px;
	}
	#caixalogin{
		
		border-radius: 25px;
	}

  

  img{
    width: 40px;
    height: 40px;
  }
@import url(https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap);
	ul,a{
		margin: 0;
		padding: 0;
		outline: none;
		border: none;
		text-decoration: none;
		box-sizing: border-box;
		font-family: "Poppis", sans-serif;
	}
	nav{
		position: absolute;
		top: 0;
		bottom: 0;
		height: 42%;
		left: 0;
		background: #fff;
		width: 87px;
		overflow: hidden;
		transition: width 0.2s linear;
		box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1 );
	}
	.logo{
		text-align: center;
		display: flex;
		transition: all 0.5s ease;
		margin: 10px 0 0 10px;

	}
	.logo img{
		width: 45px;
		height: 45px;
		border-radius: 50%;
	}
	.logo span{
		font-weight: bold;
		padding-left: 15px;
		font-size: 18px ;
		text-transform: uppercase;
	}
	a{
		position: relative;
		color: rgb(85, 83, 83);
		font-size: 14px;
		display: table;
		width: 300px;
		padding: 10px;
	}
	.fas{
		position: relative;
		width: 70px;
		height: 40px;
		top: 14px;
		font-size: 20px;
		text-align: center;
	}
	.nav-item{
		position: relative;
		top: 12px;
		margin-left: 10px;
	}
	a:hover{
		background: #eee;
	}
	nav:hover{
		width: 200px;
		transition: all 0.5s ease;
	}
	.container{
		position: relative;
		width: 250px;
	}
	.search{
		position: relative;
		width: 100%;
		padding: 10px 10px 10px 20px;
		border: 0;
		border-radius: 50px;
		overflow: hidden;
		font-family: "Poppins";
		font-size: 16px;
		transition: all 0.5s ease-in-out;
		background-color: #eee;
		
	}
	.search{
		position: absolute;
		top: 8px;
		right: -12px;
		transition: all 0.5 ease-in-out;
	}
	.search:focus-visible{
		outline: 0;
		box-shadow: 0 0 5px 5px #1374d6;
	}
	.Deletar{
		width: 10px;
	}
	.deletar{
		width: 10px;
	}
	.pesquisar{
		border: none;
    color: #ffff;
    width: 9em;
    height: 3em;
    line-height: 2em;
    text-align: center;
    background: rgb(5,20,78);
    background: linear-gradient(90deg, rgba(5,20,78,1) 0%, rgba(77,77,193,1) 35%, rgba(199,217,221,1) 100%);
    background-size: 300%;
    border-radius: 10px;
    text-transform: uppercase;
    cursor: pointer;
    z-index: 1;
	}
	.pesquisar:hover{
	animation: animation 8s linear infinite;
    border: none;
	}
	.pesquisar::before{
    content: "";
position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    z-index: -1;
    background: rgb(5,20,78);
    background: linear-gradient(90deg, rgba(5,20,78,1) 0%, rgba(77,77,193,1) 35%, rgba(199,217,221,1) 100%);
    background-size: 400%;
    border-radius: 10px;
    transition: 1s;
}
.pesquisar:hover::before{
    filter: blur(20px);
}



	</style>
    
	</head>

	<header>
	<nav> 
	<ul>
		<li>
		<a href="#" class="logo">
			<img src="../view/a (1).png" alt="">
			<span class="nav-item">HQS</span>
		</a>
		</li>

	<li><a href="tela_cadastro.html">
		<i class="fas fa-home"></i>
		<b><span class="nav-item">Cadastro</span></b>
	</a></li>

	 <li> <a href="tela_listagem.php">
		<i class="fas fa-tasks"></i>
		<b><span class="nav-item">Listagem</span></b>
	</a></li> 
	   <li><a href="tela_atualizacao.html"> 
		<i class="fas fa-cog"></i>
		<b><span class="nav-item">Recadastro</span></b>	
	</a></li>
	</ul>    
</nav>
</header>

<body>


<?php 

  $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

?>

<br>
<!-- CAMPO DE PESQUISA -->
<form action="tela_listagem.php" method="GET"><!-- GET, pega o valor através da url. -->
<center>
	<div class="container">
    <input type="text" name="login_usuario" placeholder="Search" id="input_pesquisa" class="search">
	<iconify-icon class="search-icon" icon="ant-design:search-outlined" style="color: #757575;" width="30" height="30"></iconify-icon>
	</div>
</center>
	<br><br><br>
<center>
	<div class="container">
	<input class="pesquisar" type="submit" value="Pesquisar">  
	</div>
</center>
  
</form>

<br>

<center>

<h1><b> LISTAGEM DE PRODUTOS </b></h1>

<br><br>


<?php

      $pesquisa = $dados['login_usuario'] . "%";

        //SQL para selecionar os registros
       $sql = "SELECT id,nome, ano, numdserie,autor, ilust,editora,imagem, endereco FROM hq WHERE nome LIKE :nome ORDER BY id";
       $consulta = $conectar->prepare($sql);
       $consulta -> bindParam(':nome', $pesquisa, PDO::PARAM_STR);
       $consulta->execute();
       if (!$consulta) {
         die("Erro no Banco!");
       }
       
      
       echo '<table class="table table-bordered table-dark">';
       echo "<thead>";
       echo "<tr>";
       echo "<th><center> ID </center></th>";
       echo "<th><center> Nome </center></th>";
       echo "<th><center> Ano </center></th>"; 
       echo "<th><center> Número de serie </center></th>";  
       echo "<th><center> Autor </center></th>";  
       echo "<th><center> Ilustrador </center></th>";   
       echo "<th><center> Editora </center></th>"; 
       echo "<th><center> HQ </center></th>";
	   echo "<th><center> Baixar </center></th>";
	   echo "<th><center> Deletar </center></th>";
       echo "</tr>";
       echo "</thead>";
       echo "<tbody>";

       while ($exibir = $consulta->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<th><center>" . $exibir['id'] . "</center></th>";
          echo "<td><center>" . $exibir['nome'] . "</center></td>";
          echo "<td><center>" . $exibir['ano'] . "</center></td>";
          echo "<td><center>" . $exibir['numdserie'] . "</center></td>";
          echo "<td><center>" . $exibir['autor'] . "</center></td>";
          echo "<td><center>" . $exibir['ilust'] . "</center></td>";
          echo "<td><center>" . $exibir['editora'] . "</center></td>";
		  
     
          
          $ext = pathinfo($exibir['imagem'],PATHINFO_EXTENSION); // Pega a extensão do meu arquivo

          if ($ext == 'pdf') {
            echo "<td><center> <a href='../uploads/" . $exibir["imagem"] . "'> <img src='pdf.png'> </a> </center></td>";
          } else if (($ext == 'png') || ($ext == 'jpg') || ($ext == 'jpeg') || ($ext == 'jfif')) {
            echo "<td><center> <img src='../uploads/" . $exibir['imagem'] . "'> </center></td>";
          } else if (($ext == 'mp3') || ($ext == 'mp4')) {
            echo "<td><center><audio controls preload='auto'> <soucer type='audio/mpeg' src='../uploads/" . $exibir['imagem'] . "'> </audio></center></td>";
          } 

          echo "<td><center> <a class='deletar' href='../uploads/" . $exibir["endereco"] . "' download> <img src='d.png'> </a> </center></td>";
          
        ?>

      <td>
        <center>
          <a class="Deletar" href="<?php echo "../model/deletar.php?id={$exibir['id']}"; ?>">
            <img src="excluir-pasta.png" name="id_deletar">
          </a>


        </center>
      </td>

    <?php
          echo "</tr>";
        }
        
        echo "</tbody>";        
        echo "</table>";

        ?>


<br><br><br>



        <!-- Botão Relatório -->  
        <a class="Relatorio" href="gerar_pdf.php" name="relatorio">
            <img src="relatorio.png">
        </a>
</center>


</body>

</html>
