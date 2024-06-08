<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <img class="fundo" src="images/fundo.jpg" alt="">
    <section>
    <img src="images/LOGOTIPO.png" alt="">
        <h1>LOGIN</h1>
    <form action="/login" method="post">
        <div>
            <label for="nome">Usuario:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <div class="enviar">
        <p><a href="Cadastro.php">Criar conta</a></p>
        
            <input type="submit"></input>
        </div>

        <p><a href="/esqueci_a_senha">Esqueci a senha</a></p>
    </form>
    </section>
</body>

</html>