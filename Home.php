<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Café</title>
    <link rel="stylesheet" href="css/Home.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
</head>
<body>
    <h1>Produtos Disponíveis</h1>
    <div class="container">
    <?php

        session_start();

        require_once "Banco.php";

        require_once "Header.php";

        if(!isset($_SESSION['carrinho'])) $_SESSION['carrinho'] = array();

        $resp = $banco->query("SELECT * FROM produtos");

        while ($row = $resp->fetch_assoc()) {
            echo "<div class='PedidoBox'>";
            echo "<img src='imagens/" . $row['image'] . "' alt='" . $row['name'] . "'>";
            echo "<h2>" . $row['name'] . "</h2>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<div class='preco'>R$ " . $row['price'] . "</div>";

            if (isset($_POST['pedir']) && $_POST['pedir'] == $row['id']) {
                if(isset($_POST['qnt'])) $_SESSION['carrinho'][$_POST['pedir']]['qnt'] = $_POST['qnt'];
                require_once "Pedido.php";
            } else {
                echo "<form method=\"POST\">
                    <input type=\"hidden\" name=\"pedir\" value=\"" . $row['id'] . "\">
                    <input type=\"submit\" value=\"Pedir\">
                    </form>";
            }

            echo "</div>";
        }

        var_dump($_SESSION);
    ?>
    </div>

</body>

</html>