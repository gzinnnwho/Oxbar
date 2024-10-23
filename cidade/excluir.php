<?php

include'../conexao.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM cidade where id = '$id'";

$resultado= mysqli_query($conexao, $sql);

header("location: ../cidade.php");


?>