<?php include('../db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel Admin</title>
</head>
<body>
    <h1>Produtos</h1>
    <a href="AddProduto.php">Adicionar Produto</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM produtos");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td><img src='../images/".$row['image']."' width='100'></td>";
            echo "<td><a href='EditarProduto.php?id=".$row['id']."'>Editar</a> | <a href='DeleteProduto.php?id=".$row['id']."'>Deletar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
