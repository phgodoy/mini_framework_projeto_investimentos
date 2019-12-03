<?php

namespace App\Controllers;

//recursos do framework
use MF\Controller\Action;
use MF\Model\Container;


//recursos dos models
use App\Models\Produto;
use App\Models\Investidores;

class IndexController extends Action {

	public function index() {

	
		//renderisa informacoes
		$this->render('index', 'layout1');
	} 

    public function sobreNos(){
       
	   //renderisa informacoes 
       $this->render('sobreNos', 'Layout1');
        
	}
	
	public function empresas(){
		$this->render('empresas', 'Layout1');
	}
	
	public function exemplo(){
		$produto = Container::getModel('Produto');
		$produtos = $produto->getProdutos();
		$this->view->dados = $produtos;
		//renderisa informacoes
		$this->render('exemplo', 'layout1');
	}

	public function investidores(){
		//renderisa informacoes 
		$this->render('investidores', 'Layout1');
	}

	public function inscreverse(){
		//renderisa informacoes 
	
		$this->view->erroCadastro = false;

		$this->view->usuario=array(
			'nome' => '',
			'profissao'=> '',
			'email' => '',
			'cpf' => '',
			'telefone' => '',
			'senha' => '',
		);
		$this->render('inscreverse', '');
	}

	public function login(){


		$this->view->erroLogin = false;
		//renderisa informacoes 
		$this->render('login', '');
	}

	
	public function registrar(){
		//renderisa informacoes 
	
		//receber os dados do formulario

		$investidor = Container::getModel('Usuario');
		$investidor->__set('nome', $_POST['nome']);
		$investidor->__set('profissao', $_POST['profissao']);
		$investidor->__set('email', $_POST['email']);
		$investidor->__set('cpf', $_POST['cpf']);
		$investidor->__set('telefone', $_POST['telefone']);
		$investidor->__set('senha', md5($_POST['senha']));
	
		
		//sucesso
		if($investidor->validarCadastro() && count($investidor->getUsuarioPorEmail())==0){
		
			$investidor->salvar();

			$this->render('cadastro','');
			
		}
		//fracasso 
		else{

			$this->view->usuario=array(
				'nome' => $_POST['nome'],
				'profissao' => $_POST['profissao'],
				'email' => $_POST['email'],
				'cpf' => $_POST['cpf'],
				'telefone' => $_POST['telefone'],
				'senha' => $_POST['senha'],
			);

			$this->view->erroCadastro = true;
			
			$this->render('inscreverse','');
		}	

	}

	
    public function autenticar(){

        
        
        $investidor = Container::getModel('Usuario');

        $investidor->__set('cpf', $_POST['cpf']);
        $investidor->__set('senha', md5($_POST['senha']));

       
       $retorno = $investidor->autenticar();
        
       if($investidor->__get('id') != '' && $investidor->__get('nome') != ''){
              session_start();
             $_SESSION['ID_INVESTIDOR'] = $investidor->__get('id');
             $_SESSION['NOME'] = $investidor->__get('nome'); 

             header('Location: /timeline');
       }
       else{
          
           $this->view->erroLogin = true;
           $this->render('login','');
            
       }
	}
	
	public function sair(){
		session_start();
		session_destroy();
		header('Location: /');
	}
}

?>