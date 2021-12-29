<?php

/**
 * @author Gustavo Berwian
 * Arquivo de que realiza o login do usuário
 */

session_start();
include_once("../config.php");

if (!$_POST['usuario'] || !$_POST['senha']){
    header("Location: index.php");
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$senha_encriptada_query = "SELECT * FROM usuario WHERE (usuario = '{$usuario}' OR nome = '{$usuario}' OR email = '{$usuario}')";

$senha_encriptada_result = mysqli_query($conexao, $senha_encriptada_query);

while ($rowData= $senha_encriptada_result->fetch_array()) {

    $verifica_senha = password_verify($senha, $rowData['senha']);

    if ($verifica_senha) {
        $query = "SELECT usuario FROM usuario WHERE (usuario = '{$usuario}' OR nome = '{$usuario}' OR email = '{$usuario}') AND senha = '{$rowData['senha']}'";
        $result = mysqli_query($conexao, $query);

        $row = mysqli_num_rows($result);

        if ($row == 1) {
            $_SESSION['usuario'] = $usuario;
            header("Location: ../");
        } else {
            $_SESSION['nao_autenticado'] = true;
            header("Location: ./");
        }
    }
    else{
        $_SESSION['nao_autenticado'] = true;
        header("Location: ./");
    }
}
exit();