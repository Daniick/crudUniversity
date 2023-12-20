<?php
session_start();
if (isset($_SESSION['userData'])) {
    $userData = $_SESSION['userData'];

    $cliente  = ['Shop', 'Pedidos'];
    $admin = [
        'Shop',
        'Mis Pedidos',
        'Pedidos',
        'Productos',
        'Clientes',
        'Usuarios',
    ];

    if ($userData['rol_id'] === 1) {
        $menu = $admin;
    } else if ($userData['rol_id'] === 2) {
        $menu = $cliente;
    }
}
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    a {
        text-decoration: none;
        color: black;

    }

    ul {
        display: flex;
        flex-direction: column;
        gap: 24px;
        font-size: 1.2rem;
        font-weight: 600;

    }

    li {
        list-style: none;
    }

    section {

        padding: 24px;
        min-height: calc(100vh - 64px);
        bottom: 0;
        background-color: #f2f2f2;
        width: 280px;
        position: absolute;

    }

    header {
        display: flex;
        justify-content: end;
        align-items: center;
        height: 64px;
        width: 100%;
        position: absolute;
        right: 0;
        padding: 0 24px;
        background-color: #f2f2f2;
    }

    .userConatiner {
        display: flex;
        align-items: center;
        gap: 24px;
    }

    .fotoUsuario {
        width: 40px;
        height: 40px;
        background: salmon;
        border-radius: 100%;
    }

    .mainContainer {
        width: calc(100% - 280px);
        min-height: calc(100vh - 64px);
        position: absolute;
        right: 0;
        bottom: 0;
        background-color: black;

    }
</style>
<header>
    <nav>
        <div class="userConatiner">
            <div class="fotoUsuario"></div>
            <h4><?= $userData['correo'] ?></h4>
        </div>
        <ul></ul>
    </nav>
</header>
<section>
    <ul>
        <?php foreach ($menu as $options) : ?>
            <li><a href="#"><?= $options ?></a></li>
        <?php endforeach; ?>

    </ul>
</section>

<div class="mainContainer">


</div>