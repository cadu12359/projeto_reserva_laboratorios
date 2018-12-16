<?
	session_start();
?>

<!doctype html>
<html lang="pt-br">
    <head>
    <!-- Required meta tags -->
       	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Reserva de laboratórios.</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style_reservado.css">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="JS/bootstrap.min.js"></script>

        <title>Reserva</title>

    </head>


    <body>

       <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img class="logo" alt="Brand" src="img/ifg.png">
                    </a>
                </div>
                <h1 class="titulo"><b>Últimos laboratórios reservados.</b><span class="label label-default"></span></h1>
                <h3 class="sair"><?php echo "<a href='logout.php'>Sair</a>"; ?></h3>
            </div>
        </nav>
    	
    	<div class="container tabela">
    		<table class="table table-striped table-hover">
    			<thead>
    				<tr>
    					<th>Nome do solicitante</th>
    					<th>Laboratório</th>
    					<th>Data</th>
    					<th>Hora inicial da reserva</th>
    					<th>Hora final da reserva</th>

    				</tr>
    			</thead>

    			<tbody>
    				
    					<?php 
    					include "banco.php";
    					$sqlBuscaReservaData = "SELECT DATE_FORMAT(res.data, '%d/%m/%Y') AS data, res.horaIni, res.horaFin, usu.nome, lab.lab_nome FROM reserva res, usuario usu, laboratorio lab
						WHERE (res.fk_usuario = usu.id)
						AND (res.fk_laboratorio = lab.id)
						AND (usu.email = '{$_SESSION['usuario']}')
						/*AND (res.data < {date ('2018-11-27')})*/
						ORDER BY res.data DESC";
						
						$resultadoData = mysqli_query($conexao, $sqlBuscaReservaData);
    					
    					while($data = mysqli_fetch_assoc($resultadoData)){?>
    						<tr>
	    						<td>
	    							<?php echo $data['nome']; ?>
	    						</td>

								<td>
	    							<?php echo $data['lab_nome']; ?>
	    						</td>

	    						<td>
	    							<?php echo $data['data']; ?>
	    						</td>	

								<td>
	    							<?php echo $data['horaIni']; ?>
	    						</td>	   

	    						<td>
	    							<?php echo $data['horaFin']; ?>
	    						</td> 						    			
	    							

    					<?php }
    					?>
    				</tr>
    			</tbody>
    		</table>
			<div class="btn_apagar">
	    		<a href="apaga_reserva.php"><button class="btn btn-danger">Cancelar minhas reservas.</button></a>
    		</div>    		
    	</div>
    	

    	<?php
        //print_r($_SESSION);
    	if ($_SESSION['apagado'] == true) {
                    echo "<script> alert('Reserva cancelada com sucesso.'); </script>";
                    $_SESSION['apagado'] = false;
                    
                }
               //print_r($_SESSION); 
        ?>
    </body>

    <script>

    	$(".btnExcluir").bind("click", Excluir);

    	function Excluir(){
    		var teste = $(this);
		    var par = $(this).parent().parent(); //tr
		    par.remove();
		    teste.remove();
		    alert('Reserva cancelada com sucesso.');
		};

    </script>
</html>