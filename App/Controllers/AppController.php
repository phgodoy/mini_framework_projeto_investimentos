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
        
            $empresa = $_POST['nomeEmpresa'];
            $valor = $_POST['valor'];
            $parcela = $_POST['parcela'];

            if($empresa ==''){
                echo 'erro';
            }
            echo $empresa ;
            print_r($valor);
            print_r($parcela);
            die;
                       
        }
        else{
            $this->view->erroLogin = true;
            header('Location: /login');
        }
        
    }

}

?>