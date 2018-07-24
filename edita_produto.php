<?php  
session_start();
include_once("conexao.php");
if(empty($_SESSION['usuario'])){
  header('Location: index.php');
}
//pega via GET o id pra saber qual produto apagar
$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_produto = "SELECT * FROM produtos WHERE id = '$id'";
$resultado_produto = mysqli_query($con,$result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);
?>
<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet"  href="estilo.css">

    <title>Editar Produto</title>
    <script>

      //verificar se os campos de usuário e senha foram devidamente preenchidos
      $(document).ready(function(){

        $('#btn-cad').click(function(){

          var campo_vazio = false;

          if($('#nome').val() == ''){
            $('#nome').addClass("campo-vazio");
            campo_vazio = true;
          }else{
            $('#nome').addClass("campo-vazio");
          }

          if($('#preco_comp').val() == '' || $('#preco_comp').val() == 0 ){
            $('#preco_comp').addClass("campo-vazio");
            campo_vazio = true;
          }else{
            $('#preco_comp').addClass("campo-vazio");
          }

          if($('#preco_vend').val() == '' || $('#preco_vend').val() == 0 ){
            $('#preco_vend').addClass("campo-vazio");
            campo_vazio = true;
          }else{
            $('#preco_vend').addClass("campo-vazio");
          }

          if($('#qtd').val() == '' || $('#qtd').val() == 0 ){
            $('#qtd').addClass("campo-vazio");
            campo_vazio = true;
          }else{
            $('#qtd').addClass("campo-vazio");
          }

          if(campo_vazio) return false;

        });

      });

    </script>
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
    		    <a  href="buscar.php"><i class="fas fa-search"></i>Buscar</a>
    		  </li>
         	  <li >
             	 <a  href="sair.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
          	  </li>
  		    </ul> 
    	</nav>

		<form method="POST" action="proc_edit_produto.php" class="cadastro-produto">
			<div>
				<h2>Editar Produto</h2>
			</div>
			<?php  
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
		  <div class="form-produto">
		  	<input  type="hidden"  name="id" value="<?php echo $row_produto['id'];
		    ?>">
		    <label >Nome</label>
		    <input id="nome" type="text" name="nome" value="<?php echo $row_produto['nome'];
		    ?>">
		  </div>
		  <div >
		    <label >Preço Compra</label>
		    <input id="preco_comp" type="text"   name="preco_comp" value="<?php echo $row_produto['preco_comp'];
		    ?>">
		  </div>
		  <div >
		    <label >Preço Venda</label>
		    <input id="preco_vend" type="text"     name="preco_vend" value="<?php echo $row_produto['preco_vend'];
		    ?>">
		  </div>
		  <div >
		    <label >Quantidade</label>
		    <input id="qtd" type="number"   name="qtd" value="<?php echo $row_produto['qtd'];
		    ?>">
		  </div>
		  <input type="submit" value="Editar" id="btn-cad">
		  <a href="produtos.php" >Voltar</a>
		</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>