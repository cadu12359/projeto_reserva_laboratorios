<?php
session_start();
include('banco.php');

if(empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT email from usuario where email = '{$_POST['email']}' and senha = md5('{$senha}')";
$queryNome = "SELECT nome from usuario where email = '{$_POST['email']}'";

$result = mysqli_query($conexao, $query);
$resultNome = mysqli_query($conexao, $queryNome);

$row = mysqli_num_rows($result);
$rowNome = mysqli_fetch_assoc($resultNome);

if($row == 1) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['nome'] = $rowNome;
    $_SESSION['logado'] = true;
    $_SESSION['reservado'] = false;
    $_SESSION['lab_usado'] = false;

    header('Location: laboratorios.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}

?>