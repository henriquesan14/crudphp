<?php
session_start();
include_once("conexao.php");
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

    <title>Produtos </title>
  </head>
  <body>
    <nav class="menu">

      <a href="#"><i class="fas fa-box-open icone-logo"></i>Controle de Estoque</a>

  	    <ul>
    		  <li>
    		    <a  href="#"><i class="fas fa-home"></i>Home</a>
    		  </li>
    		  <li >
    		    <a  href="cadastrar.php"><i class="fas fa-plus-square"></i>Cadastrar</a>
    		  </li>
    		  <li >
    		    <a  href="buscar.php"><i class="fas fa-search"></i>Buscar</a>
    		  </li>
          <li >
            <a  href="sair.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
          </li>
  		  </ul> 
    </nav>
    <div>
		  <h2>Produtos - Listagem</h2>
    </div>
    <table class="table" >
    <?php 
      if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }

      
      echo "<tr><th> ID</th><th> Nome </th><th> Preço Compra </th><th> Preço Venda </th><th> Quantidade </th><th> Data-Cadastro</th><th> </th><th> </th></tr>";

      $result_produtos = "SELECT * FROM produtos";
      $resultado_produtos = mysqli_query($con,$result_produtos);
      while($row_produto = mysqli_fetch_assoc($resultado_produtos)){
        echo "<tr scope='col'>";
        echo "<td>" . $row_produto['id'] . "</td>";
        echo "<td>" . $row_produto['nome'] . "</td>";
        echo "<td>" . "R$ " . $row_produto['preco_comp'] . "</td>";
        echo "<td>" . "R$ " . $row_produto['preco_vend'] . "</td>";
        echo "<td>" . $row_produto['qtd'] . "</td>";
        echo "<td>" . $row_produto['created'] . "</td>";
        echo "<td>" . "<a href='edita_produto.php?id=" . $row_produto['id'] . "'><i class='fas fa-pencil-alt'></i></a></td>";
        echo "<td>" . "<a  href='proc_apagar_produto.php?id=" . $row_produto['id'] . "'><i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
      }
      
     ?>
   </table>
 
  </body>
</html>