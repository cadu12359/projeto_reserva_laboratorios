<?php
	session_start();
	include "banco.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

    <title>Reservar Laboratório.</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="JS/bootstrap-datepicker.pt-BR.min.js"></script>

</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                        <img class="logo" alt="Brand" src="img/ifg.png">
                </a>
            </div>
            <h1 class="titulo"><b>Reservas de Laboratórios.</b><span class="label label-default"></span></h1>
            <h3 class="sair"><?php echo "<a href='index.php'>Voltar</a>"; ?></h3>
        </div>
    </nav>


    <div class="page-header container" id="topo">
        <h2>Novo usuário.</h2>
        <h4>Informe os dados necessários para que seu cadastro seja efetuado.</h4>
    </div>    

  <div class="container">

            <form action="validaCadastro.php" method="POST">
                <div class="form-group">

                    <label for="nome">Nome Completo:</label>
                    <input type="text" class="form-control" id="nome" placeholder="Insira o nome" name="nome">

                </div>

                <div class="form-group">

                    <label for="email">Email</label>
                    <input type="Email" class="form-control" id="email" placeholder="Insira o email" name="email">

                </div>

                <div class="form-group">

                    <label for="telefone">Telefone</label>
                    <input type="number" class="form-control" id="telefone" placeholder="Insira o telefone" name="telefone">

                </div>     

                <div class="form-group">

                    <label for="matricula">Matrícula ou Registro de Professor(a)</label>
                    <input type="number" class="form-control" id="matricula" placeholder="Insira o número de sua matrícula" name="matricula">

                </div> 


                <div class="form-group">           
                        <label>Data de nascimento:</label>
                        <input type="date" class="form-control" id="nascimento" name="nascimento">
                </div> 

 				<div class="form-group">

                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" placeholder="Insira a senha" name="senha">

                </div>                



              <button type="submit" class="btn btn-success botao" data-toggle="modal" data-target="#myModal">Cadastrar.</button>

            </form>

    </div>

</body>
</html>