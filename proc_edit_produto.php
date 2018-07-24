<?php 
	session_start();
	include_once("conexao.php");
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$preco_comp = filter_input(INPUT_POST, 'preco_comp', FILTER_SANITIZE_STRING);
	$preco_vend = filter_input(INPUT_POST, 'preco_vend', FILTER_SANITIZE_STRING);
	$qtd = filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_NUMBER_INT);


	$result_produtos = "UPDATE produtos SET nome='$nome',preco_comp='$preco_comp',preco_vend='$preco_vend', qtd='$qtd' WHERE id='$id'";
	$resultado_produtos = mysqli_query($con,$result_produtos);

	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color: green;text-align:center;'>Produto editado com sucesso</p>";
		header("Location: produtos.php");
	}else{
		$_SESSION['msg'] = "<p style='color: red;'>Erro ao editar produto</p>";
		header("Location: edita_produto.php?id=$id");
	}

 ?>