<?php
session_start();
include_once("./config.php");

if (isset($_POST['nome'])):$nome = mysqli_real_escape_string($conexao, $_POST['nome']); endif;
if (isset($_POST['usuario'])):$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']); endif;
if (isset($_POST['senha'])):$senha = mysqli_real_escape_string($conexao, $_POST['senha']); endif;
if (isset($_POST['email'])):$email = mysqli_real_escape_string($conexao, $_POST['email']); endif;
if (isset($_POST['nivel'])):$nivel = mysqli_real_escape_string($conexao, $_POST['nivel']); endif;
$id = $_GET['id'];

$sql = "SELECT count(*) AS total FROM usuario WHERE usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: ./?p=cadastro');
    exit;
}

if ($nome){
    $nome_sql = "nome = '".$nome."', ";
}
else{
    $nome_sql = null;
}

if ($usuario){
    $usuario_sql = "usuario = '".$usuario."', ";
}
else{
    $usuario_sql = null;
}

if ($senha){
    // Criptografando senha
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
    $senha_sql = "senha = '".$senha_criptografada."', ";
}
else{
    $senha_sql = null;
}

if ($email){
    $email_sql = "email = '".$email."', ";
}
else{
    $email_sql = null;
}

if ($nivel != "undefined"){
    $nivel_sql = "nivel = ".$nivel.", ";
}
else{
    $nivel_sql = null;
}

$sql__ = $nome_sql.$usuario_sql.$senha_sql.$email_sql.$nivel_sql;

$rtrim_sql = rtrim($sql__, ", ");

$sql = "UPDATE usuario SET ".$rtrim_sql." WHERE id = {$id};";

if($conexao->query($sql) === TRUE) {
    $_SESSION['usuario_editado'] = true;
}
else{
    echo "erro na consulta";
}

$conexao->close();

header('Location: ./?p=admin');
exit;