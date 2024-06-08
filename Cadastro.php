<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>

    <?php
    //GerenciadorUsuarios gerenciadorUsu

    $nome = $_POST['nome'] ?? null;
    $cpf = $_POST['cpf'] ?? null;
    $senha = $_POST['senha'] ?? null;

    require_once "CadastroForm.php";

    if (is_null($nome) && is_null($senha)) {
        echo "Criar usuario...";
    } else {

        require_once "GerenciadorUsu.php";
        // cadastrarUsuario($cpf, $nome, $senha);
    }

    ?>

</body>

</html>