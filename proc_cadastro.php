<?php 
	session_start();
	include_once("conexao.php");
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$preco_comp = filter_input(INPUT_POST, 'preco_comp', FILTER_SANITIZE_STRING);
	$preco_vend = filter_input(INPUT_POST, 'preco_vend', FILTER_SANITIZE_STRING);
	$qtd = filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_NUMBER_INT);



	$result_produtos = "INSERT INTO produtos(nome,preco_comp,preco_vend,qtd,created) VALUES ('$nome','$preco_comp','$preco_vend','$qtd',NOW())";
	$resultado_produtos = mysqli_query($con,$result_produtos);

	if(mysqli_insert_id($con)){
		$_SESSION['msg'] = "<p style='color: green;'>Produto cadastrado com sucesso</p>";
		header("Location: cadastrar.php");
	}else{
		$_SESSION['msg'] = "<p style='color: red;'>Erro ao cadastrar produto</p>";
		header("Location: cadastrar.php");
	}


 ?>