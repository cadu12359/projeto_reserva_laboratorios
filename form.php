<?
    $optionLab = $_POST['optionLab'];
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

    <title>Reservar Laboratório.</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="JS/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="JS/bootstrap-datepicker.pt-BR.min.js"></script>

</head>

<body>

    <div class="page-header container" id="topo">
        <h2>Reserva de laboratórios.</h2>
        <h4>Informe os dados necessários para solicitar a reserva de um laboratório.</h4>
    </div>    

  <div class="container">

            <form action="valida.php" method="POST">
                <div class="form-group">

                    <label for="nome">Nome do solicitante</label>
                    <input type="text" class="form-control" id="nome" placeholder="Insira o nome do solicitante" name="nome">

                </div>

                <div class="form-group">

                    <label for="email">Email</label>
                    <input type="Email" class="form-control" id="email" placeholder="Insira o email" name="email">

                </div>

                <div class="form-group">

                    <label for="telefone">Telefone</label>
                    <input type="number" class="form-control" id="telefone" placeholder="Insira o telefone" name="telefone">

                </div>     

                <div class="alert alert-success" role="alert">
                      teste
                </div>

                <div class="form-group">
                    
                        <label>Data inicial da reserva:</label>
                        <input type="date" class="form-control" id="data" name="data" min="2018-10-09" max="2018-12-30">
                </div>     

                <div class="form-group">
                    <input type="time" name="">
                </div>     


              <button type="submit" onclick="verifica()" class="btn btn-success botao" data-toggle="modal" data-target="#myModal">Solicitar.</button>

            </form>

    </div>

    <script>
        var nome = document.getElementById("nome").value;
          

        function verifica(){
            if (nome = 'teste' || nome = null){
                alert('digite o nome');
            }
       }
    </script>

</body>
</html>