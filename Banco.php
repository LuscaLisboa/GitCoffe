<pre>
<?php 

    $banco = new mysqli("localhost", "root", "", "gitcoffe");

// --------------------INSERIR NO BANCO DE DADOS--------------------------------------------

    function insertInto(string $into, string $value, bool $debug=true) : void{ // [BISU] deligar debug
        global $banco;

        $q = "INSERT INTO $into VALUE $value";
        $resp = $banco->query($q);

        if($debug){
            echo "<br> Query: $q";
            echo "<br> Resp: " . var_dump($resp);
        }
    }

    // USUÀRIO
    function cadastrarUsuario(string $cpf, string $nome, string $senha) : void{
        $senha = password_hash($senha, PASSWORD_DEFAULT); // Criptografia ;)
        insertInto("usuarios(cpf, nome, senha)", "('$cpf', '$nome', '$senha')");
    }

    // [BISU] falta cadastroProduto

// --------------------DELETAR NO BANCO DE DADOS--------------------------------------------

    function deleteFrom(string $from, string $where, bool $debug=true) : void{ // [BISU] deligar debug
        global $banco;

        $q = "DELETE FROM $from WHERE $where";
        $resp = $banco->query($q);

        if($debug){
            echo "<br> Query: $q";
            echo "<br> Resp: $resp";
        }
    }

    // USUÀRIO
    function deletarUsuario($cpf){
        deleteFrom("usuarios", "cpf=$cpf");
    }

    // [BISU] falta deletarProduto

// --------------------ALTERAR NO BANCO DE DADOS--------------------------------------------

    function updateWhere(string $update, string $set, string $where, bool $debug=true) : void{ // [BISU] deligar debug
        global $banco;

        $q = "UPDATE $update SET $set WHERE $where";
        $resp = $banco->query($q);

        if($debug){
            echo "<br> Query: $q";
            echo "<br> Resp: $resp";
        }
    }

    // USUÀRIO
    function alterarUsuario($cpf, $novaSenha){ // Altera a senha somente
        $senha = password_hash($novaSenha, PASSWORD_DEFAULT); // Criptografia

        updateWhere("usuarios","$senha","cpf=$cpf");
    }

    // [BISU] falta alterarProduto
?>
</pre>