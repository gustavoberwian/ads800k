<?php

/**
 * Arquivo para definição da variável cargo do usuário logado
 *
 * @author Gustavo Berwian <gustavo.rberwian@gmail.com>
 */

include_once('./config.php');

$usuario = $_SESSION['usuario'];

$query_nivel = "SELECT nivel FROM usuario WHERE usuario = '{$usuario}'";

$query_nivel_result = mysqli_query($conexao, $query_nivel);

while ($row = $query_nivel_result->fetch_assoc()){
    $nivel = $row['nivel'];
}
if ($nivel == 0){
    $_SESSION['nivel'] = "Teste";
}
elseif ($nivel == 1){
    $_SESSION['nivel'] = "Usuário";
}
elseif ($nivel == 2){
    $_SESSION['nivel'] = "Admin";
}