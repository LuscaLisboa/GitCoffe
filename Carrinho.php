<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="css/Carrinho.css">
    <link rel="stylesheet" href="css/Adm.css">
    <link rel="stylesheet" href="css/cabecalho.css">
</head>

<body>
    <h1>Carrinho de Compras</h1>
    <div class="container">
        <?php
        session_start();
        require_once "Banco.php";
        require_once "Header.php";

        if (empty($_SESSION['carrinho'])) {
            echo "<p>Seu carrinho está vazio.</p>";
        } else {
            $total = 0;
            echo "<table>";
            echo "<tr><th>Produto</th><th>Quantidade</th><th>Preço Unitário</th><th>Subtotal</th></tr>";
            foreach ($_SESSION['carrinho'] as $produto_id => $produto) {
                $resp = $banco->query("SELECT * FROM produtos WHERE id = $produto_id");
                if ($resp && $resp->num_rows > 0) {
                    $row = $resp->fetch_assoc();
                    $subtotal = $produto['qnt'] * $row['price'];
                    $total += $subtotal;
                    echo "<tr>";
                    echo "<td><img src='imagens/" . $row['image'] . "' alt='" . $row['name'] . "'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $produto['qnt'] . "</td>";
                    echo "<td>R$ " . $row['price'] . "</td>";
                    echo "<td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
            echo "<div class='total-carrinho'>";
            echo "<h3>Total: R$ " . number_format($total, 2, ',', '.') . "</h3>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>
