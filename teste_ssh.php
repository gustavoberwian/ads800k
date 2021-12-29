<?php
// Mostrar todos os erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connection = ssh2_connect('68.183.62.190');

if (!ssh2_auth_password($connection, 'root', 'nOFK}3rXqUgO}Ecafeeee^e-dT<^I-*w|,6}qPP')){
    echo "Erro ao conectar, consulte os devs...";
}

$stream = ssh2_exec($connection, 'php -v');

stream_set_blocking($stream, true);
$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
echo stream_get_contents($stream_out);