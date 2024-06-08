<?php
class GerenciadorUsuarios
{
    private $usuarios = [];

    public function cadastrarUsuario($cpf, $nome, $senha)
    {
        // Verificar se o CPF já está cadastrado
        if ($this->existeUsuario($cpf)) {
            echo "Erro: CPF já cadastrado.";
            return false;
        }

        // Criar um novo objeto Usuario
        $novoUsuario = new Usuario($cpf, $nome, $senha);

        // Adicionar o usuário ao array de usuários
        $this->usuarios[$cpf] = $novoUsuario;

        // Retornar true para indicar sucesso no cadastro
        return true;
    }

    public function existeUsuario($cpf)
    {
        // Verificar se o CPF já está cadastrado
        return isset($this->usuarios[$cpf]);
    }

    public function listarUsuarios()
    {
        // Retornar a lista de usuários
        return $this->usuarios;
    }
}