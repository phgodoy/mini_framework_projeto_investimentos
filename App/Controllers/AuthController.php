<?php

namespace App\Controllers;

//recursos do framework
use MF\Controller\Action;
use MF\Model\Container;


//recursos dos models
use App\Models\Produto;
use App\Models\Investidores;

use App\Controller\IndexController;

class AuthController extends Action{


    public function login(){


		$this->view->erroLogin = false;
		//renderisa informacoes 
		$this->render('login', '');
	}

	

    public function autenticar(){
      
        $investidor = Container::getModel('Usuario');

        $investidor->__set('email', $_POST['email']);
        $investidor->__set('senha', md5($_POST['senha']));

    
       $retorno = $investidor->autenticar();
        
       if($investidor->__get('id') != '' && $investidor->__get('nome') != ''){
          
             session_start();
             $_SESSION['ID'] = $investidor->__get('id');
             $_SESSION['NOME'] = $investidor->__get('nome'); 
             
             header('Location: /indexInvestidor');
       }
       else{
          
           $this->view->erroLogin = true;
           $this->render('login','');
            
       }
    }
}
?>