<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Pessoa;

class PessoaDAO {

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Pessoa $pessoa) {
        try{
            $sql = "INSERT INTO pessoa (nome, idade) VALUES (:nome, :idade)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $pessoa->getNome());
            $p->bindValue(":idade", $pessoa->getIdade());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
  }