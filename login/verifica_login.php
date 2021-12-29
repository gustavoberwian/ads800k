<?php

/**
 * @author Gustavo Berwian
 * Arquivo que verifica se há uma sessão ativa no momento
 */

session_start();
if (!$_SESSION['usuario']){
    header("Location: ./login");
    exit();
}