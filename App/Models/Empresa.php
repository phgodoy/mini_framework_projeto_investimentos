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
        $query = "SELECT * FROM `empresa`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $empresas = $stmt->fetchAll();

        return $empresas;

    
    }
    public function listarPorValor(){
        $query = "SELECT NOME, EMAIL, VLR_INVESTIDO FROM empresa ORDER BY VLR_INVESTIDO DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $empresas = $stmt->fetchAll();
      
        return $empresas;
    
    }


    public function getIdinvestidor($nomeInvestidor){
        $query = "SELECT `ID` FROM `investidor` WHERE `NOME` = :nome";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $nomeInvestidor);
        $stmt->execute();

        $idinvestidor = $stmt->fetch(\PDO::FETCH_ASSOC);

        $id = implode( $idinvestidor);

        return $id;
    }


    public function getIdEmpresa($nomeEmpresa){
        $query = "SELECT `ID_EMPRESA` FROM `empresa` WHERE `NOME` = :nome";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $nomeEmpresa);
        $stmt->execute();

        $idEmpresa = $stmt->fetch(\PDO::FETCH_ASSOC);

        $id = implode($idEmpresa);

        return $id;
    }

    // adiciona valor investido a tavela empresa
    public function empresaRecebe($valor, $idEmpresa){
        
        $query = "UPDATE `empresa` SET `TOTAL_INVESTIDO` = :valor WHERE `empresa`.`ID_EMPRESA` = :idempresa;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':valor', $valor);
        $stmt->bindValue(':idempresa', $idEmpresa);
        $stmt->execute();

        $empresaRecebe = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $empresaRecebe;
    }

    public function pagar($nomeEmpresa, $valor, $parcela, $vlrParcela){
        $nomeInvestidor =  $_SESSION['NOME'];

        $idInvestidor = $this->getIdinvestidor($nomeInvestidor);
        $idEmpresa = $this->getIdEmpresa($nomeEmpresa);
     
        $query = "INSERT INTO `investimento`(ID_INVESTIDOR, ID_EMPRESA, `EMPRESA`, `VLR_INVESTIDO`, `PARCELA`, `VLR_PARCELA`) VALUES (:idinvestidor, :idempresa, :nome, :valor, :parcela, :vlrparcela )";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idinvestidor', $idInvestidor);
        $stmt->bindValue(':idempresa', $idEmpresa);
        $stmt->bindValue(':nome', $nomeEmpresa);
        $stmt->bindValue(':valor', $valor);
        $stmt->bindValue(':parcela', $parcela);
        $stmt->bindValue(':vlrparcela', $vlrParcela);
        $stmt->execute();
    
        $empresas = $stmt->fetch(\PDO::FETCH_ASSOC);

        //adiciona ao valor total arrecadado pela empresa
        $this->empresaRecebe($valor, $idEmpresa);

        return $empresas;
    }

    public function historico(){
        $nomeInvestidor =  $_SESSION['NOME'];
        
       
        $idInvestidor = $this->getIdinvestidor($nomeInvestidor);
        
        $query = "SELECT `EMPRESA`, `VLR_INVESTIDO`, `PARCELA`, `VLR_PARCELA` FROM `investimento`  WHERE `investimento`.`ID_INVESTIDOR` = :idinvestidor;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idinvestidor', $idInvestidor);
        $stmt->execute();
    
        $empresas = $stmt->fetchAll(\PDO::FETCH_ASSOC);

       
        
        return  $empresas;
    }

}
?>