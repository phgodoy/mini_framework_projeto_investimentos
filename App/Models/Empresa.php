<?php

namespace App\Models;

use MF\Model\Model;

class Empresa extends Model {
    
    private $nome;
    private $email;
    private $vlr_investido;
    
    
    

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    
    //listar
    public function listar(){
        $query = "SELECT NOME, EMAIL, VLR_INVESTIDO FROM empresa ORDER BY VLR_INVESTIDO DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $empresas = $stmt->fetchAll();

      
        return $empresas;
        

        die;
    
    }
}
?>