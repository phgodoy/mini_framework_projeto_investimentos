<?php
namespace App\Controllers;

//recursos do framework
use MF\Controller\Action;
use MF\Model\Container;


//recursos dos models
use App\Models\Usuario;

use App\Models\Empresa;

use App\Controller\IndexController;


class AppController extends Action{




    public function indexInvestidor(){

        session_start();

        if($_SESSION['ID_INVESTIDOR'] != '' && $_SESSION['NOME'] != ''){
        
            $this->render('indexInvestidor','Layout2');
        }
        else{
            $this->view->erroLogin = true;
            header('Location: /login');
        }
       
    }

    public function perfilInvestidor(){
        session_start();

        if($_SESSION['ID_INVESTIDOR'] != '' && $_SESSION['NOME'] != ''){
        
               
            $usuario = Container::getModel('Usuario');
            $this->view->usuarios = $usuario->listar();
            $this->render('perfilInvestidor', 'Layout2');
         
        }
        else{
            $this->view->erroLogin = true;
            header('Location: /login');
        }
        
    }
    public function ranking(){
        session_start();

        if($_SESSION['ID_INVESTIDOR'] != '' && $_SESSION['NOME'] != ''){
        
            
            $empresa = Container::getModel('Empresa');
            $this->view->empresas = $empresa->listar();
            $this->render('ranking', 'Layout2');            
        }
        else{
            $this->view->erroLogin = true;
            header('Location: /login');
        }
        
    }

    public function investir(){
        session_start();

        if($_SESSION['ID_INVESTIDOR'] != '' && $_SESSION['NOME'] != ''){
        
            $this->view->erroInvestir = false;    
            $empresa = Container::getModel('Empresa');
            $this->view->empresas = $empresa->listar();
            $this->render('investir', 'Layout2');            
        }
        else{
            $this->view->erroLogin = true;
            header('Location: /login');
        }
        
    }
    public function pagar(){
        session_start();

        if($_SESSION['ID_INVESTIDOR'] != '' && $_SESSION['NOME'] != ''){
        
            $nomeEmpresa = $_POST['nomeEmpresa'];
            $valor = $_POST['valor'];
            $parcela = $_POST['parcela'];
            $empresa = Container::getModel('Empresa');

            if($nomeEmpresa ==''){
                $this->view->erroInvestir = true;
                header('Location: /investir');
            }
            $this->view->empresas = $empresa->pagar($nomeEmpresa, $valor);
            $this->render('pagamentorealizado', '');
                       
        }
        else{
            $this->view->erroLogin = true;
            header('Location: /login');
        }
        
    }

}

?>