<?php

namespace MF\Model;

use MF\Model\Model;

class Investidor extends Model {
    
    private $id;
    private $nome;
    private $profissao;
    private $email;
    private $cpf;
    private $telefone;
    private $senha;
    

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    
    //salvar
    public function salvar(){
        $query = "INSERT INTO investidor(NOME, PROFISSAO, EMAIL, CPF, TELEFONE, SENHA )VALUES(:nome, :profissao, :email, :cpf, :telefone, :senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('Nome'));
        $stmt->bindValue(':profissao', $this->__get('PROFISSAO'));
        $stmt->bindValue(':email', $this->__get('EMAIL'));
        $stmt->bindValue(':cpf', $this->__get('CPF'));
        $stmt->bindValue(':telefone', $this->__get('TELEFONE'));
        $stmt->bindValue(':senha', $this->__get('SENHA'));
        $stmt->execute();
        
        return $this;         
    }
    //validar cadastro 


    //recuperar usuario por email

    
}

?>