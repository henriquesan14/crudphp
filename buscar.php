<?php
session_start();
include_once("conexao.php");

//verifica se a variavel session está vazia, pra proibir acesso direto
if(empty($_SESSION['usuario'])){  
  header('Location: index.php');
}

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet"  href="estilo.css">

    <title>Buscar produtos</title>
  </head>
  <body>
	    <nav class="menu">

      			<a href="produtos.php"><i class="fas fa-box-open icone-logo"></i>Controle de Estoque</a>

  	    	<ul>
	    		<li>
	    		   <a  href="produtos.php"><i class="fas fa-home"></i>Home</a>
	    		</li>
	    		<li >
	    		   <a  href="cadastrar.php"><i class="fas fa-plus-square"></i>Cadastrar</a>
	    		</li>
	    		<li >
	    		   <a  href="#"><i class="fas fa-search"></i>Buscar</a>
	    		</li>
	          	<li >
	            	<a  href="sair.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
	          	</li>
  		  	</ul> 
    	</nav>

		<form method="POST" action="" >
			<div>
				<h2>Buscar Produtos</h2>
			</div>
			<br>
		  <div class="busca">
		    <input type="text" class="input-busca" name="nome" placeholder="Pesquise o produto..." maxlength="50">
		  <input type="submit" class="input2-busca"name="SendPesq" value="Pesquisar" >
		  </div>
		</form> 
		<table class="table" >
		<?php
      	echo "<tr><th> ID:</th><th> Nome: </th><th> Preço Compra: </th><th> Preço Venda: </th><th> Quantidade: </th><th> Data-Cadastro: </th><th> </th><th> </th></tr>";
		$SendPesq = filter_input(INPUT_POST, 'SendPesq', FILTER_SANITIZE_STRING);
		if($SendPesq){
			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			$result_produto = "SELECT * FROM produtos WHERE nome LIKE '%$nome%' ";
			$resultado_produto = mysqli_query($con, $result_produto);
			//percorre por linha o resultado da query sql
			while($row_produto=mysqli_fetch_assoc($resultado_produto)){
				echo "<tr scope='col'>";
		        echo "<td>" . $row_produto['id'] . "</td>";
		        echo "<td>" . $row_produto['nome'] . "</td>";
		        echo "<td>" . "R$ " . $row_produto['preco_comp'] . "</td>";
		        echo "<td>" . "R$ " . $row_produto['preco_vend'] . "</td>";
		        echo "<td>" . $row_produto['qtd'] . "</td>";
		        echo "<td>" . $row_produto['created'] . "</td>";
		        echo "<td>" . "<a href='edita_produto.php?id=" . $row_produto['id'] . "'><i class='fas fa-pencil-alt'></i></a></td>";
		        echo "<td>" . "<a href='proc_apagar_produto.php?id=" . $row_produto['id'] . "'><i class='fas fa-trash-alt'></i></a></td>";
		        echo "</tr>";
			}
				

		}

		?>
		</table>
   
  </body>
</html>