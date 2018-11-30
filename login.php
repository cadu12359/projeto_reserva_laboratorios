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

$queryId = "SELECT id from usuario where email = '{$_SESSION['usuario']}'";

$result = mysqli_query($conexao, $query);
$resultNome = mysqli_query($conexao, $queryNome);
$resultId = mysqli_query($conexao, $queryId);

$row = mysqli_num_rows($result);
$rowNome = mysqli_fetch_assoc($resultNome);
$rowResuld = mysqli_fetch_assoc($resultId);


if($row == 1) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['id_usuario'] = $rowResuld['id'];
    $_SESSION['nome'] = $rowNome;
    $_SESSION['logado'] = true;
    $_SESSION['reservado'] = false;
    $_SESSION['lab_usado'] = false;
    $_SESSION['apagado'] = false;

    header('Location: laboratorios.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}

?>