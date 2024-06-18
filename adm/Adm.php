<!DOCTYPE html>
<html>

<head>
    <title>Painel Admin</title>
    <link rel="stylesheet" href="../css/Adm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
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

        require "../Banco.php";

        $resp = $banco->query("SELECT * FROM produtos");
        while ($row = $resp->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td><img src='../imagens/" . $row['image'] . "' width='100'></td>";
            echo "<td><a href='EditarProduto.php?id=" . $row['id'] . "'>Editar</a> | <a href='DeleteProduto.php?id=" . $row['id'] . "'>Deletar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>