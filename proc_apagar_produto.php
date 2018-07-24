<?php 
	session_start();
	include_once("conexao.php");
	$id=filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
	if(!empty($id)){
		$result_produto = "DELETE FROM produtos WHERE id='$id'";
	$resultado_produto = mysqli_query($con,$result_produto);
		if(mysqli_affected_rows($con)){
			$_SESSION['msg'] = "<p style='color: green;text-align:center;'>Produto apagado com sucesso</p>";
			header("Location: produtos.php");
		}else{
			$_SESSION['msg']= "<p style='color: red;'>Erro ao apagar produto</p>";
			header("Location: edita_produto.php?id=$id");
		}
	}else{
		$_SESSION['msg']= "<p style='color: red;'>Necessário selecionar um usuário</p>";
			header("Location: edita_produto.php?id=$id");
	}
	

 ?>