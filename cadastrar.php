<?php
session_start();
include_once("./config.php");

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$nivel = mysqli_real_escape_string($conexao, $_POST['nivel']);
echo 'Senha: '.$senha.'<br/>';
// Criptografando senha
$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
echo 'Senha criptografada: '.$senha_criptografada.'<br/>';
$sql = "SELECT count(*) AS total FROM usuario WHERE usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: ./?p=cadastro');
    exit;
}

$sql = "INSERT INTO usuario (nome, usuario, senha, email, nivel) VALUES ('$nome', '$usuario', '$senha_criptografada', '$email', '$nivel')";

if($conexao->query($sql) === TRUE) {
    $_SESSION['usuario_cadastrado'] = true;
}

$conexao->close();

header('Location: ./?p=cadastro');
exit;