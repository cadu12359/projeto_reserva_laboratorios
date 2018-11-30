<?php
session_start();
//print_r($_POST);
include "banco.php";

//verificando se as informações do formulário foram passadas
if (!empty($_POST['optionLab']) && !empty($_POST['data']) && !empty($_POST['horaIni']) && !empty($_POST['horaFin'])) {

	    $solicitante = array();

	    $solicitante['lab'] = $_POST['optionLab'];
	    $solicitante['nome'] = $_SESSION['nome']['nome'];
	    $solicitante['email'] = $_SESSION['usuario'];


		if (isset($_POST['data'])) {
	        $solicitante['data'] = $_POST['data'];
	        $_SESSION['data_reserva'] =  $_POST['data'];
	    } else {
	        $solicitante['data'] = '';
	    }

		if (isset($_POST['horaIni'])) {
	        $solicitante['horaIni'] = $_POST['horaIni'];
	    } else {
	        $solicitante['horaIni'] = '';
	    }	 

		if (isset($_POST['horaFin'])) {
	        $solicitante['horaFin'] = $_POST['horaFin'];
	    } else {
	        $solicitante['horaFin'] = '';
	    }	 

	    //verifica se já existe uma reserva com os dados passados
		$sqlVerifica = "SELECT id from reserva where 
		    data = '{$solicitante['data']}'
		    AND fk_laboratorio = '{$solicitante['lab']}'
		    AND horaIni = '{$solicitante['horaIni']}'
		    AND horaFin = '{$solicitante['horaFin']}'
		    ";
	    $resultadoVerifica = mysqli_query($conexao, $sqlVerifica);
	    
	    //se existir, a variável global "$_SESSION['lab_usado']" é tida comom verdadeiro
	    if (mysqli_num_rows($resultadoVerifica) >= 1) {
	    	$_SESSION['lab_usado'] = true;
	    	header('Location: laboratorios.php');
	    }else{

			//se não existir uma reserva com os dados informados, é buscando o ID do usuário para gravar a reserva
		    $queryId = "SELECT id from usuario where email = '{$_SESSION['usuario']}'";   
		    $resultId = mysqli_query($conexao, $queryId);
		    $rowResuld = mysqli_fetch_assoc($resultId);


		    $sqlGravarData = "INSERT INTO reserva
	                    (data, horaIni, horaFin, fk_usuario, fk_laboratorio)
	                    VALUES
	                    ('{$solicitante['data']}', '{$solicitante['horaIni']}', '{$solicitante['horaFin']}', '{$rowResuld['id']}', '{$solicitante['lab']}')";


	    	//a reserva é gravada 
	    	$gravado = mysqli_query($conexao, $sqlGravarData); 
		    
		    if ($gravado >= 1) {
		    	$_SESSION['reservado'] = true;
		    	header('Location: laboratorios.php');
		    }
	    	    	
	    }
}else{
	header('Location: laboratorios.php');
  	exit();
}

?>