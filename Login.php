<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <form action="/login" method="post">
        <div>
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
        <p><a href="/esqueci_a_senha">Esqueci a senha</a></p>
    </form>


</body>

</html>