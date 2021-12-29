<?php

/**
 * @author Gustavo Berwian
 * Arquivo que realiza o logout do usuário e encerra a sessão
 */

session_start();
session_destroy();
header('Location: ./login');
exit();