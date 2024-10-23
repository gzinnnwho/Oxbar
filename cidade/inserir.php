<?php

include("../conexao.php");

// recebendo os dados do front-end
$nome=$_REQUEST["nome"];
$estado=$_REQUEST["estado"];
$cep=$_REQUEST['cep'];

echo"testando: $nome $cpf $senha";

$sql = "INSERT INTO cidade(nome,estado,cep) values ('$nome', '$estado', '$cep')";

//executar codigo SQL
$resultado = mysqli_query($conexao, $sql);

header("Location: ../cidade.php");

?>