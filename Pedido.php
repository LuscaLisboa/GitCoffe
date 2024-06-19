<form action="" method="post">
    <input type="hidden" name="pedir" value="<?php echo $_POST['pedir']; ?>">
    <label for="qnt">Quantidade:</label>
    <input type="number" id="qnt" name="qnt" min="1" value="1" required>
    <input type="submit" name="submit" value="Confirmar Pedido">
</form>
<?php
if(isset($_POST['submit'])) {
    $produto_id = $_POST['pedir'];
    $quantidade = $_POST['qnt'];

    // Verifica se o produto já está no carrinho
    if(isset($_SESSION['carrinho'][$produto_id])) {
        // Se já estiver, adiciona a quantidade especificada
        $_SESSION['carrinho'][$produto_id]['qnt'] += $quantidade;
    } else {
        // Se não estiver, adiciona o produto ao carrinho com a quantidade especificada
        $_SESSION['carrinho'][$produto_id] = array('qnt' => $quantidade);
    }

    // Redireciona de volta para a página anterior (página de produtos)
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>