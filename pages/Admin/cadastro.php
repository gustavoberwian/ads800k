<style>
    *{
        outline: none;
    }
    .nHeader{
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%,0);
        height: 60px;
        padding: 12px;
        font-size: 32px;
        font-weight: bold;
        color: #11101d;
        cursor: pointer;
    }
    .container{
        width: 100%;
        height: 480px;
        padding: 10px 2%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cadBox{
        width: 90%;
        height: 100%;
        display: flex;
    }
    .forms{
        width: 70%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }

    .forms input{
        width: 60%;
        height: 40px;
        background: rgba(204, 204, 204, 0)!important;
        border: none;
        border-bottom: 1px solid #1D1B31;
        text-align: center;
        transition: .5s;
    }

    .forms input:focus{
        border-bottom: 1px solid #0e8ed0;
    }

    .forms select{
        width: 60%;
        height: 40px;
        background: rgba(204, 204, 204, 0)!important;
        border: none;
        border-bottom: 1px solid #1D1B31;
        text-align: center;
        transition: .5s;
    }

    .forms select:focus{
        border-bottom: 1px solid #0e8ed0;
    }

    .perfil{
        width: 30%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .perfil-box{
        width: 100%;
        max-width: 280px;
        overflow: hidden ;
    }

    .perfil-box img{
        width: 100%;
    }

    .add_avatar{
        padding-top: 20px ;
    }

    .add_avatar a{
        text-decoration: none;
        color: #334D5C;
        padding: 10px 44px;
        background: rgba(255, 255, 255, 0);
        border: 2px solid #ffffff;
        border-radius: 4px;
        transition: .5s;
    }

    .add_avatar a:hover{
        background: #334D5C;
        color: #f1f1f2;
        border: 2px solid #334D5C;
    }


    @media screen and (max-width: 815px) {
        .cadBox{
            flex-direction: column-reverse;
            align-items: center;
            justify-content: center;
        }
        .perfil{
            padding-bottom: 40px;
        }
    }






    * {
        box-sizing: border-box;
    }

    .main {
        background-color: #262626;
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .button{
        position: relative;
        display: block;
        width: 200px;
        height: 36px;
        border-radius: 4px;
        background-color: #334D5C;
        border: solid 1px transparent;
        color: #fff;
        font-size: 18px;
        font-weight: 300;
        cursor: pointer;
        transition: all .1s ease-in-out;
        text-decoration: none;
    }

    .button:hover {
        background-color: #1c89ff;
        border-color: transparent;
        transition: all .1s ease-in-out;
    }


    .loader {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        background: transparent;
        margin: 30px auto 0 auto;
        border: solid 2px #424242;
        border-top: solid 2px #1c89ff;
        border-radius: 50%;
        opacity: 0;
    }

    .check {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transform: translate3d(-4px,50px,0);
        opacity: 0;
    }
    .check span:nth-child(1) {
        display: block;
        width: 10px;
        height: 2px;
        background-color: #334D5C;
        transform: rotate(45deg);
    }

    .check span:nth-child(2) {
        display: block;
        width: 20px;
        height: 2px;
        background-color: #334D5C;
        transform: rotate(-45deg) translate3d(14px, -4px, 0);
        transform-origin: 100%;
    }

    .loader.active {
        animation: loading 2s ease-in-out;
        animation-fill-mode: forwards;
    }

    .check.active {
        opacity: 1;
        transform: translate3d(-4px,4px,0);
        transition: all .5s cubic-bezier(.49, 1.74, .38, 1.74);
        transition-delay: .2s;
    }

    @keyframes loading {
        30% {
            opacity:1;
        }

        85% {
            opacity:1;
            transform: rotate(1080deg);
            border-color: #262626;
        }
        100% {
            opacity:1;
            transform: rotate(1080deg);
            border-color: #1c89ff;
        }
    }

    .btn_container{
        width: 100%;
        height: 160px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
</style>

<?php
include_once('./login/verifica_login.php');
include_once('./config.php');
include_once('define_cargo.php');

if ($_SESSION['nivel'] == 'Teste' || $_SESSION['nivel'] == 'Usuário'){
    echo "<p style='color: red; background-color: black;'>Usuáio sem permissão</p>";
}
else{

?>

<div class="nHeader">
    <div class="logo">CADASTRO</div>
</div>

<form action="./cadastrar.php" method="post">
    <div class="container">
        <div class="cadBox" style="justify-content: center">
            <div class="forms">
                <label for="nome"></label><input placeholder="Nome completo" type="text" name="nome" id="nome">
                <label for="usuario"></label><input placeholder="Nome de usuário" type="text" name="usuario" id="usuario">
                <label for="email"></label><input placeholder="Email" type="email" name="email" id="email">
                <?php if (isset($_SESSION['senhas_diferentes'])){ ?>
                    <p style="color: red">As senhas devem ser iguais.</p>
                <?php } unset($_SESSION['senhas_diferentes']) ?>
                <label for="senha"></label><input placeholder="Senha" type="password" name="senha" id="senha">
                <label for="nivel"></label>
                <select id="nivel" name="nivel">
                    <option value="undefined">Escolha a permissão do usuário</option>
                    <option value="0">Teste</option>
                    <option value="1">Usuário</option>
                    <option value="2">Admin</option>
                </select>
            </div>
            <!--        <div class="perfil">-->
            <!--            <div class="perfil-box">-->
            <!--                <img src="./image/profile.png">-->
            <!--            </div>-->
            <!--            <div class="add_avatar">-->
            <!--                <a href="#">add Avatar</a>-->
            <!--            </div>-->
            <!--        </div>-->
        </div>

    </div>
    <div class="btn_container">

        <button type="submit" class="button">Cadastrar</button>

        <?php if(isset($_SESSION['usuario_existe'])){ ?>
        <p class="desaparece" style="color: red">Usuário com credenciais parecidos já cadastrado.</p>
        <?php } if (isset($_SESSION['usuario_cadastrado'])){ ?>
            <div id="loader" class="desaparece loader">
                <div class="check">
                    <span class="check-one"></span>
                    <span class="check-two"></span>
                </div>
            </div>
        <?php } unset($_SESSION['usuario_existe']); unset($_SESSION['usuario_cadastrado']); ?>

    </div>
</form>
<script>
    setTimeout(function() {
        $('.desaparece').fadeOut('fast');
    }, 4700);
</script>
<script src="./pages/Admin/cad.js"></script>
<?php }