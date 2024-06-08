<?php
class GerenciadorUsu
{
    private $usuarios = [];

    public function cadastrarUsuario($cpf, $nome, $senha)
    {
        if ($this->existeUsuario($cpf)) {
            echo "Erro: CPF já cadastrado.";
            return false;
        }

        $novoUsuario = new Usuario($cpf, $nome, $senha);

        $this->usuarios[$cpf] = $novoUsuario;

        return true;
    }

    public function existeUsuario($cpf)
    {
        return isset($this->usuarios[$cpf]);
    }

    public function listarUsuarios()
    {
        return $this->usuarios;
    }
}