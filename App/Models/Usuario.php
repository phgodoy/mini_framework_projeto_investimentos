<?php

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model{
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
    public function salvar() {
        
        $query = "INSERT INTO investidor(NOME, PROFISSAO, EMAIL, CPF, TELEFONE, SENHA )VALUES(:nome, :profissao, :email, :cpf, :telefone, :senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':profissao', $this->__get('profissao'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->bindValue(':senha', $this->__get('senha'));    
        $stmt->execute();

        return $this;     
    }
    //validar cadastro
    public function validarCadastro(){
        $valido = true;

        if(strlen($this->__get('nome')) < 3){
            $valido = false;
        }
        if(strlen($this->__get('profissao')) < 3){
            $valido = false;
        }
        if(strlen($this->__get('email')) < 3){
            $valido = false;
        }
        if(strlen($this->__get('cpf')) < 3){
            $valido = false;
        }
        if(strlen($this->__get('telefone')) < 3){
            $valido = false;
        }
        if(strlen($this->__get('senha')) < 3){
            $valido = false;
        }

        return $valido;
    }
    //recuperar um usuario  
    public function getUsuarioPorEmail(){
        $query = "SELECT nome, email, cpf FROM investidor WHERE EMAIL = :email, CPF = :cpf ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->execute();

        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    public function autenticar(){
       
        $query = "SELECT ID, NOME,PROFISSAO, EMAIL, CPF, TELEFONE FROM investidor WHERE EMAIL = :email AND SENHA = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();
       
        $investidor = $stmt->fetch(\PDO::FETCH_ASSOC);
     
        if($investidor["ID"] !='' && $investidor['NOME'] !=''){
            $this->__set('id', $investidor['ID']);
            $this->__set('nome', $investidor['NOME']);
            $this->__set('profissao', $investidor['PROFISSAO']);
            $this->__set('cpf', $investidor['CPF']);
            $this->__set('telefone', $investidor['TELEFONE']);
        }
        return $this;  
    }

    public function listar(){
        $id = $_SESSION['ID'];
        $query = "SELECT NOME, PROFISSAO, EMAIL, TELEFONE, CPF FROM investidor WHERE ID = $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $usuario = $stmt->fetchAll();

        return $usuario;
    }

    public function investir($empresa, $valor, $parcelas){
        $query = "INSERT INTO `parcelas`(`VL_TOTAL`, `QTD_PARCELAS`) VALUES ( $valor,$parcelas);";
        $query = "INSERT INTO `empresa`(`$empresa`, `QTD_PARCELAS`) VALUES ( $valor,$parcelas);";

        
    }

}


?>