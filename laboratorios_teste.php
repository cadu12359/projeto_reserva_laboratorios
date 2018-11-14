<?php
session_start();

if(!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

//print_r($_SESSION);

include "banco.php";

$sqlBuscaLab = 'SELECT id, nome  FROM laboratorio';
$resultadoLab = mysqli_query($conexao, $sqlBuscaLab);
//print_r($_SESSION['usuario']);
?>

<!doctype html>
<html lang="pt-br">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
    

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="css/style_lab.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">

        <title>Reserva de laboratórios</title>

    </head>


    <body>

        <header class="row">   
            
            <div class="page-header topo col-md-11">
                <h2>Instituto Federal de Goiás - Reserva de Lavoratórios. </h2>
            </div>   

            <ul>
                <li><h3 class="logout"><?php echo " <a href='logout.php'>Sair</a>"; ?></h3></li>
            </ul>
        </header> 

            <div class="container" id="formulario">
                         
                <form action="valida.php" method="POST">
                    <div class="form-group">

                        <label>Selecione o laboratório que deseja reservar.</label>

                        <select class="form-control select" id="optionLab" name="optionLab">
                            <option>Selecione o laboratório</option>
                            <?php
                               while($labs = mysqli_fetch_assoc($resultadoLab)){ 
                            ?>
                            <option value="optionLab" id="optionLab">   
                               <?php echo $labs['nome'];  ?>

                            </option>                    

                            <?php } ?> 
                        </select> 
                    </div>

                    <div class="form-group">
                        <label>Selecione a data que deseja reservar o laboratório.</label>
                        <input type="date" name="data" class="form-control" id="data" min="2018-10-22" max="2018-11-22">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Selecione a hora inicial da reserva</label>
                        <input type="time" class="form-control"  name="hora" id="hora">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Selecione a hora final da reserva</label>
                        <input type="time" class="form-control" name="hora" id="hora">
                    </div>

                    <button type="submit" class="btn btn-success botao" data-toggle="modal" data-target="#myModal">Solicitar.</button>                    

                </form>
                

            <div class="container aviso">
                <h3>IMPORTANTE</h3>

                <p>O Instituto Federal de Goiás possui 3 tipos de laboratórios, sendo eles de Informática, Química e Engenharia Elétrica, selecione o que deseja reservar.</p>

            </div>      

            <script type="text/javascript">
              

                function validaEscolha(){
                    var escolha = parseInt('escolha');
                    document.getElementById("escolha").value = 1;

                }
            </script>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>


</html>