<?php 
	session_start();
	include_once("conexao.php");
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']); //função pra criptografia md5

	//query pra pesquisar se usuario e senha existe no banco de dados
	$result_usuario = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha = '$senha'";
	$resultado_usuario = mysqli_query($con, $result_usuario);

	if($resultado_usuario){
		$dados_usuario = mysqli_fetch_array($resultado_usuario);
		if(isset($dados_usuario['usuario'])){
			//adiciona os dados a variavel session, liberando a navegação
			$_SESSION['usuario'] = $dados_usuario['usuario']; 
			header('Location: produtos.php');
		}else{
			$_SESSION['msg'] = "<p style='color: red;'>Usuário e/ou senha inválido(s)</p>";
			header('Location: index.php');
		}
	}else{
		echo "Erro";
	}

	



 ?>