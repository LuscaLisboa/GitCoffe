<?php

class Usuario
{
    private $cpf;
    private $nome;
    private $senha;

    public function __construct($cpf, $nome, $senha)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->senha = $senha;
    }

    public function getCpf()
    {
        return $this->cpf;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getSenha()
    {
        return $this->senha;
    }
}