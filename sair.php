<?php
session_start();
session_unset();  //limpa a variável session e bloqueia o acesso direto
    header("Location: index.php");
?>