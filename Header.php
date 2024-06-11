<header class="header">
    <img src="imagens/LOGOTIPO.png" class="logo">
    <nav class="navbar">
        <a href="#">Meus Pedidos</a>
        <a href="Home.php">Cardapios</a>
        <a href="#">Perfil</a>
        <?php
        session_start();
        if ($_SESSION['nome'] === 'adm' && $_SESSION['cpf'] === '00000000000') {
            echo "<a href=\"adm/Adm.php\">Inventário</a>";
        }
        ?>
    </nav>
    <img src="imagens/user2.png" class="user">
</header>