<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>ADS | Login</title>
</head>
<body>
<main>
    <div class="left-side">
        <img src="./img/outer-space-animate (1).svg" alt="">
    </div>
    <form action="login.php" method="POST">
        <div class="right-side">
            <div class="card-login">
                <h2>LOGIN</h2>
                <?php
                if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <h2>Usuário ou senha inválidos.</h2>
                <?php
                endif;
                unset($_SESSION['nao_autenticado']);
                ?>
                <div class="text-field">
                    <label for="user">Usuário</label>
                    <input type="text" placeholder="Usuário" name="usuario" id="user" required>
                </div>
                <div class="text-field">
                    <label for="password">Senha</label>
                    <input type="password" placeholder="Senha" name="senha" id="password" required>
                </div>
                <button type="submit" class="btn-login">LOGIN</button>

            </div>
        </div>
    </form>
</main>


<a class="feedback" href="#">Feedback | Bug Report</a>

<script type='text/javascript'>document.addEventListener('DOMContentLoaded', function () {window.setTimeout(document.querySelector('svg').classList.add('animated'),1000);})</script>
<script src="./js/main.js"></script>
</body>
</html>