<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
    <img class="fundo" src="imagens/fundo.jpg" alt="">
    <section>
        <img src="imagens/LOGOTIPO.png" alt="">
        <h1>LOGIN</h1>
        <?php

        require_once "Banco.php";

        require_once "Header.php";

        if (isset($_SESSION['nome'])) {
            header("Location: Home.php");
            exit;
        } else {
            require "LoginForm.php";

            if (isset($_POST['nome']) && isset($_POST['senha'])) {
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];

                $q = "SELECT cpf, nome, senha FROM usuario WHERE nome='$nome'";

                $busca = $banco->query($q);
                echo print_r($busca);

                if ($busca->num_rows > 0) {
                    $obj_usuario = $busca->fetch_object();
                    echo print_r($obj_usuario);

                    if (password_verify($senha, $obj_usuario->senha)) {
                        $_SESSION['nome'] = $obj_usuario->nome;
                        $_SESSION['cpf'] = $obj_usuario->cpf;

                        header("Location: Home.php");
                        exit;
                    } else echo "Senha incorreta.";
                }
            }
        }
        ?>
    </section>
</body>

</html>