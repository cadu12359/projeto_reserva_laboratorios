<?php
//CONFIG HOSPEDAGEM 000
/*
$bdServidor = 'localhost';
$bdUsuario = 'id7437604_root';
$bdSenha = 'Ab@752';
$bdBanco = 'id7437604_reservas';
*/

//CONFIG LOCAL
$bdServidor = 'localhost';
$bdUsuario = 'root';
$bdSenha = 'Ab@752';
$bdBanco = 'reservas';


$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}
 

function gravar_solicitante($conexao, $solicitante) {
    $sqlGravarSolicitante = "
        INSERT INTO solicitante
        (nome, email, telefone)
        VALUES
        (
            '{$solicitante['nome']}',
            '{$solicitante['email']}',
            {$solicitante['telefone']}
        )
    ";
    
    $gravado = mysqli_query($conexao, $sqlGravarSolicitante);
}


function buscar_lab($conexao){
	$sqlBuscaLab = 'SELECT id, nome  FROM laboratorio';
	$resultadoLab = mysqli_query($conexao, $sqlBuscaLab);
	$laboratorios = array();
	while ($aux = mysqli_fetch_assoc($resultadoLab)) {
        $laboratorios[] = $aux;
    }
    return $laboratorios;	
}

function grava_reserva($conexao, $solicitante){

	$sqlGravarData = "INSERT INTO reserva
                    (data, horaIni, horaFin, fk_usuario, fk_laboratorio)
                    VALUES
                    ('{$solicitante['data']}', '{$solicitante['horaIni']}', '{$solicitante['horaFin']}', 18, '{$solicitante['lab']}')";

	mysqli_query($conexao, $sqlGravarData);
}

function grava_usuario($conexao, $usuario){

    $sqlGravarUsu = "INSERT INTO usuario
                    (nome, email, senha, nascimento, matricula, telefone)
                    VALUES(
                    '{$usuario['nome']}', '{$usuario['email']}', md5('{$usuario['senha']}'), '{$usuario['nascimento']}', {$usuario['matricula']}, {$usuario['telefone']})";    

    mysqli_query($conexao, $sqlGravarUsu);
}

function verificaReserva($conexao){
    $sqlVerifica = "SELECT id from reserva where 
    data = '{$solicitante['data']}'
    AND fk_laboratorio = '{$solicitante['lab']}'
    AND horaIni = '{$solicitante['horaIni']}'
    AND horaFin = '{$solicitante['horaFin']}'
    ";
    $resultadoVerifica = mysqli_query($conexao, $sqlVerifica);
     return $resultadoVerifica;
}

?>