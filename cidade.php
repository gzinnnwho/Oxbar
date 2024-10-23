<?php

include "validacao.php";
include "conexao.php";

//destino do formulario para inserir por padrao
$destino='./usuario/inserir.php';

//se id alt for diferente de vazio - se existir idAlt
if(!empty($_GET['idAlt'])){

  //guardar variavel $id o valor da pessoa clicando no lapis da tabela
  $id= $_GET['idAlt'];

  //busca usuario do idAlt
$sql= "SELECT * FROM usuario WHERE id='$id'"; 

$dados= mysqli_query($conexao, $sql);

//variavel com nossos dados:
$dadosAlt= mysqli_fetch_assoc($dados);

$destino='./usuario/alterar.php';

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>sistema Oxbar</title>
  <link rel="stylesheet" href="./recursos/style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" type="imagex/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4IXQwsjvl4KhZ8p-4Za4LqW5Qh36Mz69JMA&s">

  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
</head>

<body>
  
<?php 

include'menusuperior.php';

?>


  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 menu">

      <?php
      
      include 'menulateral.php';
      
      ?> 

      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md card">
            <h3>Cadastro</h3>

            <form action="<?=$destino?>" method="post">

            <div class="form-group">
                <label>Id</label>
                <input value="<?php echo isset($dadosAlt) ? $dadosAlt['id'] : '' ?>" name="id" readonly  type="text" class="form-control" placeholder="Seu id ">
              </div>

              <div class="form-group">
                <label>Nome</label>
                <input value="<?php echo isset($dadosAlt) ? $dadosAlt['nome'] : '' ?>" name="nome"  type="text" class="form-control" placeholder="Seu nome" required>
              </div>

              <div class="form-group">
                <label>CPF</label>
                <input value="<?php echo isset($dadosAlt) ? $dadosAlt['cpf'] : '' ?>" name="cpf" type="text" class="form-control cpf" aria-describedby="emailHelp"
                  placeholder="Seu CPF" required>
              </div>
              <div class="form-group">
                <label>Senha</label>
                <input value="<?php echo isset($dadosAlt) ? $dadosAlt['senha'] : '' ?>" name="senha" type="password" class="form-control" placeholder="Senha" required>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                <label class="form-check-label" for="exampleCheck1">Clique em mim</label>
              </div>
              <button type="submit" class="btn btn-success">Cadastrar</button>
              <button type="reset" class="btn btn-danger">Limpar</button>
            </form>
          </div>

          <div class="col-md card">
            <h3>Listagem</h3>

            <table class="table" id="tabela">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">CPF</th>
                  <th scope="col">Opções</th>
                </tr>
              </thead>
              <tbody>

                <?php

//slq para selecionar todos os usuarios
                $sql = "select * from usuario";
                $resultado = mysqli_query($conexao, $sql);
               //looping onde $coluna, vai representar os dados do banco
               //cada linha é um registro diferente
               while ($coluna = mysqli_fetch_assoc($resultado)){

               


                ?>


                <tr>
               
                  <td><?php echo $coluna['id']?></td>
                  <td><?php echo $coluna['nome']?></td>
                  <td><?php echo $coluna['cpf']?></td>
                  <td>

                 <a href="principal.php?idAlt=<?= $coluna['id'] ?>"><i class="fa-solid fa-pen mr-3" style="color: #639702;"></i></a>
                 <a href="<?php echo './usuario/excluir.php?id='.$coluna['id'] ?>"><i class="fa-solid fa-trash-can" style="color: #a20606;"></i></a>

                  </td> 
                </tr>
                <tr>
<?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
    integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
    integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
  <script src="./recursos/script.js"></script>
</body>

</html>