<?php
session_start();
include "banco.php";
		
			$sqlApaga = "DELETE FROM reserva WHERE 
		    fk_usuario = {$_SESSION['id_usuario']}";

	    	$resultadoApaga = mysqli_query($conexao, $sqlApaga);
		
	   
	    //se existir, a variável global "$_SESSION['apagado']" é tida como verdadeiro
	    if ($resultadoApaga == true) {
	    	$_SESSION['apagado'] = true;
	    	header('Location: reservados.php');
	    }else{
	    	header('Location: reservados.php');
	    }
	   

?>