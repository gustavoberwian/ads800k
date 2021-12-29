<style>
    *{
        outline: none !important;
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
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .users-box{
        width: 100%;
        height: 500px;
        max-width: 700px;
        margin-top: 30px;
        overflow-y: scroll;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: rgba(255,255,255,0);
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #334D5C;
        border-radius: 4px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: rgba(31, 55, 68, 0.51);
    }

    section.user_cell{
        width: 98%;
        height: 90px;
        background: rgba(166, 224, 201, 0.99);
        border-radius: 8px;
        margin-bottom: 10px;
        display: flex;
        flex-direction: row;
    }
    .user_info{
        height: 100%;
        width: 40%;
        display: flex;
        flex-direction: row;
    }

    .user_info .user_logo{
        width: 100%;
        max-width: 90px;
        height: 100%;
    }

    .user_info .user_logo img{
        width: 80%;
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        margin-left: 20px;
    }
    .user_info .user_name p{
        font-size: 18px;
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        margin-left: 25px;
        font-weight: normal;
    }

    .user_role{
        width: 30%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .user_role p{
        background: #334D5C;
        padding: 5px 22px;
        border-radius: 8px;
        color: #f1f1f2;
        font-weight: bold;
        position: relative;
        left: 20px;
    }
    .user_config{
        width: 30%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: right;
        padding-right: 20px;
    }

    .user_config a{
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #f1f1f2;
        border-radius: 4px;
    }

    .user_config button{
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #f1f1f2;
        border-radius: 4px;
        border: none;
    }

    a.edit{
        background: #334D5C;
        margin-right: 8px;
    }
    a.remove{
        background: rgba(255, 0, 0, 0.7);
    }

</style>
<div class="nHeader">
    <div class="logo">ADMIN</div>
</div>
<?php

$consulta_usuarios = "SELECT * FROM usuario";
$con = $conexao->query($consulta_usuarios) or die($conexao->error);

?>
<div class="container">
    <div class="users-box">

        <?php while ($dado = $con->fetch_array()) {
            $cargo = $dado['nivel'];
            $id = $dado['id'];
            $nome = $dado['nome'];

            if ($cargo == 2) {
                $cargo = "Admin";
            } else if ($cargo == 1) {
                $cargo = "Usuário";
            } else if ($cargo == 0) {
                $cargo = "Teste";
            } else {
                $cargo = "Undefined";
            }
            ?>

            <section class='user_cell'> <!-- USER_CELL -->
                <div class='user_info'>
                    <div class='user_logo'>
                        <img src='./image/profile.png' alt>
                    </div>
                    <div class='user_name'>
                        <p><?=$nome ?></p>
                    </div>
                </div>
                <div class='user_role'>
                    <p><?=$cargo ?></p>
                </div>
                <div class='user_config'>
                    <a class='edit' href='./?p=edita&id=<?=$id ?>'>
                        <i class='fas fa-user-edit'></i>
                    </a>
                    <a class='remove' href='delete.php?id=<?=$id ?>'>
                        <i class='fas fa-trash'></i>
                    </a>
                </div>
            </section>
        <?php } ?>

    </div>
</div>
<div class="container">
    <div style="text-align: center">
        <div>
            <a href="./?p=cadastro">
                <i style="color: #334D5C; font-size: xx-large" class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>
</div>
