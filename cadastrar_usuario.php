<?php
session_start();
include_once("conexao.php");

  ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>

    <link rel="stylesheet"  href="estilo.css">

    <title>Cadastrar Usuário</title>
    <script>

      //verificar se os campos de usuário e senha foram devidamente preenchidos
      $(document).ready(function(){

        $('#btn-login').click(function(){

          var campo_vazio = false;

          if($('#campo-usuario').val() == ''){
            $('#campo-usuario').addClass("campo-vazio");
            campo_vazio = true;
          }else{
            $('#campo-usuario').addClass("campo-vazio");
          }

          if($('#campo-senha').val() == ''){
            $('#campo-senha').addClass("campo-vazio");
            campo_vazio = true;
          }else{
            $('#campo-senha').addClass("campo-vazio");
          }

          if(campo_vazio) return false;

        });

      });

    </script>
  </head>
  <body class="bg">
	    
      <form method="POST" action="proc_cadastro_usuario.php" class="form-login" >
        <h2>Cadastrar Usuário</h2>
        <img src="imagens/login.png" style="width: 100px;height: 100px;display:block;margin:20px auto;">
        <br>

        <div class="form-group">
          <input type="text" name="usuario" placeholder="Novo Usuário" class="form-control" maxlength="50" id="campo-usuario">
        </div>
        

        <div class="form-group">
          <input type="password" minlength="6" maxlength="30" name="senha" placeholder="Nova Senha" class="form-control" id="campo-senha">
        </div>
        <div class="form-group">
          <input type="submit" value="Cadastrar" " id="btn-login">
          <a href="index.php" >Voltar</a>
        </div>
        <?php  
            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
          ?>
        
          
      </form>

  </body>
</html>