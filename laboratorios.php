<?php
session_start();
setlocale(LC_ALL, 'pt_BR');

if(!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

//print_r($_SESSION);

include "banco.php";

$sqlBuscaLab = 'SELECT id, lab_nome  FROM laboratorio';
$resultadoLab = mysqli_query($conexao, $sqlBuscaLab);
//print_r($_SESSION['usuario']);

$i = 1;
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
       
       <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img class="logo" alt="Brand" src="img/ifg.png">
                    </a>
                </div>
                <h1 class="titulo"><b>Reservas de Laboratórios.</b><span class="label label-default"></span></h1>
                <h3 class="sair"><?php echo "<a href='logout.php'>Sair</a>"; ?></h3>
            </div>
        </nav>

      <!--  <header clas="header">
            <div class="header-content">
                <div class="nav">
                    <ul>
                        <li>
                            <div class="logo">
                                <img src="img/ifg.png">
                            </div>
                        </li>
                        <li>
                            <div class="titulo">
                                <h1>Instituto Federal de Goiás - Reserva de Lavoratórios. Olá <?php echo $_SESSION['nome']['nome']; ?></h1>
                            </div>
                        </li>
                        <li class="sair"><h4><?php echo " <a href='logout.php'>Sair</a>"; ?></h4></li>
                    </ul>
                </div>
            </div>
        </header>  -->

            <div class="container" id="formulario">
                         
                <form action="valida.php" method="POST">
                    <div class="form-group">

                        <label>Selecione o laboratório que deseja reservar.</label>

                        <select class="form-control select" id="optionLab" name="optionLab">
                            <!--                            
                            <?php
                               while($labs = mysqli_fetch_assoc($resultadoLab)){ 
                            ?>
                            <option value="optionLab" id="optionLab">   
                               <?php echo $labs['lab_nome'];  ?>

                            </option>                    

                            <?php } ?> 
                            -->
                            <option value="0">Selecione o laboratório</option>
                            <option value="1">Laboratório de informática 1</option>
                            <option value="2">Laboratório de informática 2</option>
                            <option value="3">Laboratório de informática 3</option>
                            <option value="4">Laboratório de química 1</option>
                            <option value="5">Laboratório de química 2</option>
                            <option value="6">Laboratório de química 3</option>
                            <option value="7">Laboratório de Engenharia Elétrica 1</option>
                            <option value="8">Laboratório de Engenharia Elétrica 2</option>
                            <option value="9">Laboratório de Engenharia Elétrica 3</option>
                        </select> 
                    </div>

                    <div class="form-group">
                        <label>Selecione a data que deseja reservar o laboratório.</label>
                        <input type="date" name="data" class="form-control" id="data" min="2018-11-30" max="2018-12-31">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Selecione a hora inicial da reserva</label>
                        <input type="time" class="form-control"  name="horaIni" id="hora" min="08:00" max="21:00">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Selecione a hora final da reserva</label>
                        <input type="time" class="form-control" name="horaFin" id="hora" min="08:00" max="22:00">
                    </div>

                    <button type="submit" class="btn btn-success botao btn-lg col-md-2" data-toggle="modal" data-target="#myModal">Solicitar.</button> 

                    
                        <a href="reservados.php"><button type="button" class="btn btn-success botao2 btn-lg col-md-3">Últimas reservas realizadas.</button></a>
                                       

                </form>
                

            <div class="container aviso">
                <h3>IMPORTANTE</h3>

                <p>O Instituto Federal de Goiás possui 3 tipos de laboratórios, sendo eles de Informática, Química e Engenharia Elétrica, selecioner o que deseja reservar, informando a data e o horário.</p>

            </div>  
            
            <?php
                //verificando se foi reservado e emitindo alerta de suceso, e limpando a sessão
                if ($_SESSION['reservado'] == true) {
                    echo "<script> alert('Laboratório reservado com sucesso'); </script>";
                    $_SESSION['reservado'] = false;
                    //print_r($_SESSION);
                }

                if ($_SESSION['lab_usado'] == true) {
                    echo "<script> alert('Desculpe, este laboratório já está reservado para esta data e esse horário.'); </script>";
                    $_SESSION['lab_usado'] = false;
                    //print_r($_SESSION);
                }                
            ?>

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