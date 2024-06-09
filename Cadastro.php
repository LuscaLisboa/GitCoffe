<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/Cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <img class="fundo" src="imagens/fundo.jpg" alt="">
    <section >
        <img src="imagens/LOGOTIPO.png" alt="">
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
    </section>
</body>

</html>