<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>

    <form action="/submit" method="post">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>

        <div>
            <label for="confirmar_senha">Confirmar Senha:</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" required>
        </div>

        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>

</body>

</html>