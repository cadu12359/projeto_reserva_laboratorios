<?php
session_start();
include "banco.php";

		$sqlApaga = "SELECT id from reserva where 
		    data = '{$solicitante['data']}'
		    AND fk_laboratorio = '{$solicitante['lab']}'
		    AND horaIni = '{$solicitante['horaIni']}'
		    AND horaFin = '{$solicitante['horaFin']}'
		    ";
	    $resultadoApaga = mysqli_query($conexao, $sqlApaga);
	    
	    //se existir, a variável global "$_SESSION['lab_usado']" é tida comom verdadeiro
	    if (mysqli_num_rows($resultadoApaga) >= 1) {
	    	$_SESSION['apagado'] = true;
	    	header('Location: laboratorios.php');
	    }else{
	    	header('Location: reservados.php');
	    }

?>