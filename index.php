<?php
session_start();
include_once("conexao.php");

  ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>


    <link rel="stylesheet"  href="estilo.css">

    <title>Login</title>
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
	    
      <form method="POST" action="validar_acesso.php" class="form-login">
        
        <img src="imagens/login.png" style="width: 100px;height: 100px;display:block;margin:20px auto;">
        
        <br>

        <div >
          <input type="text" name="usuario" placeholder="Usuário"  maxlength="50" id="campo-usuario">
        </div>

        <div >
          <input type="password" minlength="6" maxlength="30" name="senha" placeholder="Senha" id="campo-senha">
        </div>
        <div >
          <input type="submit" value="Entrar" id="btn-login" class="btn-login" >
        </div>
        <div>
          <a  href="cadastrar_usuario.php">Cadastrar</a>
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