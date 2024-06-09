<?php
class GerenciadorUsu
{
    private $usuarios = [];

    public function cadastrarUsuario($cpf, $nome, $senha)
    {
        if ($this->verificarAdm($cpf, $nome)) return false;
        elseif ($this->existeUsuario($cpf)) return false;

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

    public function verificarAdm($cpf, $nome){
        if ($cpf == "00000000000" || ctype_lower($nome) == "adm") return true;
        else return false;
    }
}