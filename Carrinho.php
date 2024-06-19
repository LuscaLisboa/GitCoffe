<?php
session_start();
require_once 'Banco.php';
if (isset($_POST['finalize_order'])) {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['id'];
            $quantity = $item['quantity'];
            $sql = "INSERT INTO orders (product_id, quantity) VALUES ('$product_id', '$quantity')";

            if (!$conn->query($sql)) {
                echo "Erro: " . $sql . "<br>" . $conn->error;
                exit();
            }
        }

        unset($_SESSION['cart']);
        echo "Pedido finalizado com sucesso!";
    } else {
        echo "Carrinho vazio!";
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Carrinho de Compras</title>
</head>
<body>
    <h1>Carrinho de Compras</h1>
    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <table border="1">
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
            </tr>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $item):
                $total += $item['price'] * $item['quantity'];
            ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td>R$ <?php echo htmlspecialchars($item['price']); ?></td>
                <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                <td>R$ <?php echo htmlspecialchars($item['price'] * $item['quantity']); ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">Total</td>
                <td>R$ <?php echo $total; ?></td>
            </tr>
        </table>
        <form action="Carrinho.php" method="post">
            <input type="submit" name="finalize_order" value="Finalizar Pedido">
        </form>
    <?php else: ?>
        <p>Seu carrinho está vazio!</p>
    <?php endif; ?>
    <a href="Home.php">Continuar Comprando</a>
</body>
</html>
