<?php
namespace App\Controllers;

//recursos do framework
use MF\Controller\Action;
use MF\Model\Container;


//recursos dos models
use App\Models\Produto;
use App\Models\Investidores;

use App\Controller\IndexController;


class AppController extends Action{

    public function timeline(){

        session_start();

        if($_SESSION['ID_INVESTIDOR'] != '' && $_SESSION['NOME'] != ''){
        
            $this->render('timeline','');
        }
        else{
            $this->view->erroLogin = true;
            header('Location: /login');
        }
       
    }

}

?>