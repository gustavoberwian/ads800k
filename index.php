<?php
//const WP_DEBUG = false;
include_once('./login/verifica_login.php');
include_once('./config.php');
include_once('define_cargo.php');
//teste
$usuario = $_SESSION['usuario'];
$cargo = $_SESSION['nivel'];
// admin é falso
$admin = false;

if ($cargo == "Admin"){
    $admin = true;
}

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>ADS System</title>
    <link rel="shortcut icon" href="./image/alienLogo.ico" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./js/pace.main.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/4a8d35f4ff.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./modal/remodal.css">
    <link rel="stylesheet" href="./modal/remodal-default-theme.css">
</head>
<body>
<div class="sidebar close">
    <div class="logo-details">
        <i class="fas fa-rocket"></i>
        <span class="logo_name">800K</span>
    </div>
    <ul class="nav-links">
        <li>
            <div class="iocn-link">
                <a href="?p=adv">
                    <i class='bx bx-collection' ></i>
                    <span class="link_name">ADV's</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="?p=adv">ADV's</a></li>
                <li><a href="?p=duplicar">Duplicar</a></li>
                <li><a href="?p=novo_dominio">Novo Dominio</a></li>
                <li><a href="?p=substituir_adv">Substituir ADV</a></li>
                <li><a href="?p=trocar_pre">Trocar Pré</a></li>
                <li><a href="?p=alterar_subdomain">Alterar SubDomain</a></li>
            </ul>
        </li>
        <?php if ($admin){ ?>
        <li>
            <a href="?p=historico">
                <i class='bx bx-history'></i>
                <span class="link_name">Histórico</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="?p=historico">Histórico</a></li>
            </ul>
        </li>
        <li>
            <a href="?p=admin">
                <i class="fas fa-user-tie"></i>
                <span class="link_name">Admin</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="?p=admin">Admin</a></li>
            </ul>
        </li>
        <?php } ?>

        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="./image/profile.png" alt="">
                </div>
                <div class="name-job">
                    <div class="profile_name"><?=$usuario ?></div>
                    <div class="job"><?=$cargo ?></div>
                </div>
                <a href="logout.php"><i class='bx bx-log-out' ></i></a>
            </div>
        </li>
    </ul>
</div>
<section style="height: 100%!important;" class="home-section">
    <div class="home-content">
        <i class='bx bx-menu' ></i>
    </div>
    <?php

    $value = @$_GET['p'];

    if($value == null){
        include("./pages/advs/adv.php");
    }

    else if($value == 'adv' || $value == 'alterar_subdomain' || $value == 'duplicar' || $value == 'novo_dominio' || $value == 'alterar_subdomain' || $value == 'trocar_pre' ){
        include ("./pages/advs/$value.php");
    }

    else if($value == 'config'){
        include ("./pages/config/$value.php");
    }

    else if($value == 'historico'){
        include ("./pages/historico/$value.php");
    }

    else if($value == 'admin'){
        include ("./pages/Admin/$value.php");
    }

    else if($value == 'cadastro'){
        include ("./pages/Admin/$value.php");
    }

    else if($value == 'edita'){
        include ("./pages/Admin/$value.php");
    }

    ?>
</section>





<script src="script.js"></script>
<script src="./js/pace.min.js"></script>
<script src="./modal/remodal.min.js"></script>
</body>
</html>
