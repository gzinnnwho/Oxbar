<?php 

// iniciar sessao
session_start();

// se nao existe variavel de sessao CPF ou SENHA

if (!isset($_SESSION["cpf"]) && !isset($_SESSION["senha"])) {

    // destruir sessão
session_destroy();

//limpar variaveies de sessão
unset($_SESSION["cpf"]);
unset($_SESSION["senha"]);

//manda para o login
header("location: index.php");

}

?>