<?php
session_start();
include('db.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM products WHERE id=$id");
    $row = $result->fetch_assoc();
} else {
    echo "ID do produto não fornecido ou inválido!";
    exit();
}

if (isset($_POST['add_to_cart'])) {
    $quantity = intval($_POST['quantity']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $id) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $_SESSION['cart'][] = [
            'id' => $id,
            'name' => $row['name'],
            'price' => $row['price'],
            'quantity' => $quantity
        ];
    }

    header("Location: Peido.php?id=$id&added=1");
    exit();}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Realizar Pedido</title>
</head>
<body>
    <h1>Realizar Pedido</h1>
    <?php if (isset($_GET['added'])): ?>
        <p style="color:green;">Produto adicionado ao carrinho!</p>
    <?php endif; ?>
    <form action="Peido.php?id=<?php echo $id; ?>" method="post">
        <p>Produto: <?php echo htmlspecialchars($row['name']); ?></p>
        <p>Preço: R$ <?php echo htmlspecialchars($row['price']); ?></p>
        <label for="quantity">Quantidade:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1"><br><br>
        <input type="submit" name="add_to_cart" value="Adicionar ao Carrinho">
        <a href="Carrinho.php">Finalizar Pedido</a>
    </form>
</body>
</html>
