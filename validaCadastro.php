<?php
session_start();
include "banco.php";

if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['nascimento']) && !empty($_POST['matricula']) && !empty($_POST['telefone'])) {

	    $usuario = array();

	    $usuario['nome'] = $_POST['nome'];

	    if (isset($_POST['email'])) {
	    	$usuario['email'] = $_POST['email'];
	    	$email = $_POST['email'];
	    	$pegaEmail = "SELECT * FROM usuario WHERE email = '$email'";
	    	$result = mysqli_query($conexao, $pegaEmail);
	        
	    } else {
	        $usuario['email'] = '';
	    }

		if (isset($_POST['telefone'])) {
	        $usuario['telefone'] = $_POST['telefone'];
	    } else {
	        $usuario['telefone'] = '';
	    }

		if (isset($_POST['matricula'])) {
	        $usuario['matricula'] = $_POST['matricula'];
	    } else {
	        $usuario['matricula'] = '';
	    }	

		if (isset($_POST['nascimento'])) {
	        $usuario['nascimento'] = $_POST['nascimento'];
	    } else {
	        $usuario['nascimento'] = '';
	    } 

		if (isset($_POST['senha'])) {
	        $usuario['senha'] = $_POST['senha'];
	    } else {
	        $usuario['senha'] = '';
	    } 	    


	    if (mysqli_affected_rows($conexao) >= 1) {
	    	echo "Email já cadastrado, use outro por favor.";
	    }else{
	    	$_SESSION['usuario'] = $usuario;
	    	grava_usuario($conexao, $usuario);
  			echo "<h2>Cadastro efetuado com sucesso <a href='index.php'>Fazer Login.</a> </h2>";
		}	

	    //print_r($_SESSION['usuario']);
	    //header('Location: index.php');
	    
	    //print_r($conexao);
}else{
	echo "Insira as informações necessárias <a href='cadastro.php'>Voltar</a>";
}

?>