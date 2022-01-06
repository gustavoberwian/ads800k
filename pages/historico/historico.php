<style>
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
</style>
<div class="nHeader">
    <div class="logo">HISTÓRICO</div>
</div>
<?php
include_once('./login/verifica_login.php');
include_once('./config.php');
include_once('define_cargo.php');

if ($_SESSION['nivel'] == 'Teste' || $_SESSION['nivel'] == 'Usuário'){
    echo "<p style='color: red; background-color: black;'>Usuáio sem permissão</p>";
}
else{

}
