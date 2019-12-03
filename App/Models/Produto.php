<?php

namespace App\Models;

//recursos dos models
use MF\Model\Model;

class Produto extends Model {

	

	public function getProdutos() {
		
		$query = "select ID_INVESTIDOR, NOME, PROFISSAO, EMAIL, CPF, TELEFONE from investidor";
		return $this->db->query($query)->fetchAll();
	}
}

?>