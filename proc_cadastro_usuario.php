<?php 
	session_start();
	include_once("conexao.php");
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);
	$usuario_existe =  false;

	//verifica se o usuário já é cadastrado
	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
	if($resultado_id = mysqli_query($con,$sql)){
		$dados_usuarios = mysqli_fetch_array($resultado_id);
		
		if(isset($dados_usuarios['usuario'])){
			$usuario_existe = true;
			$_SESSION['msg'] = "<p style='color: red;'>Usuário já existe</p>";
		}
	}else{
		echo "erro ao tentar localizar o registro de usuário";
	}

	if($usuario_existe){
		header('Location: cadastrar_usuario.php?erro_usuario=1&');
		die();
	}

	
	$result_usuarios = "INSERT INTO usuarios(usuario, senha)
	VALUES ('$usuario', '$senha')";
	$resultado_usuarios = mysqli_query($con, $result_usuarios);

	if(mysqli_insert_id($con)){
		$_SESSION['msg'] = "<p style='color: green;text-align:center;'>Usuário cadastrado com sucesso</p>";
		header("Location: index.php");
	}else{
		$_SESSION['msg'] = "<p style='color: red;'>Erro ao cadastrar usuário</p>";
		header("Location: cadastrar_usuario.php");
	}




 ?>