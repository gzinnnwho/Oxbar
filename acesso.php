<?php

//importando arquivo de conexao com banco
include 'conexao.php';


//recebendo dados da tela de login(front-end)
$cpf = $_REQUEST['cpf'];
$senha = $_REQUEST['senha'];

// echo"ola seu cpf: $cpf e senha : $senha";

//selecione o usuario onde o cpf='$cpf' do login e senha='$senha' do login
$sql= "SELECT * FROM usuario where cpf = '$cpf' and senha= '$senha' " ;

//executa codigo sql com a permiçao da conexao
$resultado = mysqli_query($conexao, $sql);

//cada valor é associado ao nome da coluna no banco
$colunas= mysqli_fetch_assoc($resultado);

if(mysqli_num_rows($resultado) > 0 ){

session_start();
$_SESSION['usuario'] =  $colunas['nome'];
$_SESSION['cpf'] = $cpf;
$_SESSION['senha'] = $senha;

header('location: principal.php');

}else{
    
    session_unset();
    session_destroy();
    header('location: index.php');

}

?>