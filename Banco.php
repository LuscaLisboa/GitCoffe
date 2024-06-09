<pre>
<?php 

    $banco = new mysqli("localhost", "root", "", "gitcoffe");

// --------------------INSERIR NO BANCO DE DADOS--------------------------------------------

    function insertInto(string $into, string $value, bool $debug=true) : void{
        global $banco;

        $q = "INSERT INTO $into VALUE $value";
        $resp = $banco->query($q);

        if($debug){
            echo "<br> Query: $q";
            echo "<br> Resp: " . var_dump($resp);
        }
    }

    function cadastrarUsuario(string $cpf, string $nome, string $senha) : void{
        $senha = password_hash($senha, PASSWORD_DEFAULT); // Criptografia ;)
        insertInto("usuario(cpf, nome, senha)", "('$cpf', '$nome', '$senha')");
    }

    // [BISU] falta cadastroProduto

// --------------------DELETAR NO BANCO DE DADOS--------------------------------------------

    function deleteFrom(string $from, string $where, bool $debug=true) : void{
        global $banco;

        $q = "DELETE FROM $from WHERE $where";
        $resp = $banco->query($q);

        if($debug){
            echo "<br> Query: $q";
            echo "<br> Resp: $resp";
        }
    }

    function deletarUsuario($cpf){
        deleteFrom("usuario", "cpf=$cpf");
    }

    // [BISU] falta deletarProduto

// --------------------ALTERAR NO BANCO DE DADOS--------------------------------------------

    function updateWhere(string $update, string $set, string $where, bool $debug=true) : void{
        global $banco;

        $q = "UPDATE $update SET $set WHERE $where";
        $resp = $banco->query($q);

        if($debug){
            echo "<br> Query: $q";
            echo "<br> Resp: $resp";
        }
    }

    function alterarUsuario($cpf, $novaSenha){ // Altera a senha somente
        $senha = password_hash($novaSenha, PASSWORD_DEFAULT); // Criptografia

        updateWhere("usuario","$senha","cpf=$cpf");
    }

    // [BISU] falta alterarProduto

// --------------------CADASTRO DO ADMINISTRADOR--------------------------------------------
    cadastrarUsuario("00000000000","adm","senha");

?>
</pre>