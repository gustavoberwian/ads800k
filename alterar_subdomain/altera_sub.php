<?php
session_start();
$_SESSION['subdominio_nao_alterado'] = false;
$_SESSION['subdominio_alterado'] = false;

$dominio = isset($_POST['dominio']) ? $_POST['dominio'] : '';
$dominio = isset($_POST['dominio']) ? $_POST['dominio'] : $dominio;

$subdominio = isset($_POST['subdominio']) ? $_POST['subdominio'] : '';
$subdominio = isset($_POST['subdominio']) ? $_POST['subdominio'] : $subdominio;

$novo_subdominio = isset($_POST['novo_subdominio']) ? $_POST['novo_subdominio'] : '';
$novo_subdominio = isset($_POST['novo_subdominio']) ? $_POST['novo_subdominio'] : $novo_subdominio;

// TRATANTO VARIÁVEIS PARA EXECUTAR COMANDO NO SERVIDOR

$comando = "mv";

$caminho1 = " /var/www/".$dominio."/htdocs/".$subdominio;

$caminho2 = " /var/www/".$dominio."/htdocs/".$novo_subdominio;

$comando = $comando.$caminho1.$caminho2;

$log = array(
    array("0", "68.183.62.190", "nOFK}3rXqUgO}Ecafeeee^e-dT<^I-*w|,6}qPP"),
    array("1", "178.128.148.17", "nOFK}3rXqUmonsterzadagO}E^e-dT<^I-*w|,6}qPP"),
    array("2", "138.197.2.229", "nOFK}3rXqUbotO}E^e-dT<quadriciclo^I-*w|,6}qPP"),
    array("3", "64.225.10.21", "nOFK}3rXqUbotO}E^e-dT<ads-bombando^I-*w|,6}qPP")
);

for ($i = 0; $i < 4; $i++){
    $connection = ssh2_connect($log[$i]['1']);

    if (!ssh2_auth_password($connection, 'root', $log[$i]['2'])){
        $_SESSION['subdominio_nao_alterado'] = true;
        header("Location: ../?p=alterar_subdomain");
    }

    if (!$stream = ssh2_exec($connection, $comando)){
        $_SESSION['subdominio_nao_alterado'] = true;
        header("Location: ../?p=alterar_subdomain");
    }
    else{

        stream_set_blocking($stream, true);
        $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);

        if (!empty(stream_get_contents($stream_out))){
            $_SESSION['subdominio_nao_alterado'] = true;
            header("Location: ../?p=alterar_subdomain");
        }

        $_SESSION['subdominio_alterado'] = true;
        unset($_SESSION['subdominio_nao_alterado']);
        header("Location: ../?p=alterar_subdomain");
    }
}






