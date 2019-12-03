<?php

namespace MF\Controller;

abstract class Action{
    //variavel controladora
    protected $view;

    //construçao do controle de rotas
    public function __construct(){
        $this->view = new\stdClass();
    }

    //faz a renderizacao do layout
    protected function render($view, $layout){
        $this->view->page = $view;
        //verificaa se o arquivo existe se nao renderiza apenas o conteudo das views
        if(file_exists("../App/Views/$layout.phtml")){
            require_once "../App/Views/$layout.phtml";
        }else{
            $this->content();
        }
        
        
    }

    //renderizacao da pagina
    protected function content(){
        $classeAtual  =  get_class($this);
        $classeAtual = str_replace('App\\Controllers\\', '', $classeAtual);
        
        $classeAtual =  strtolower(str_replace('Controller','',$classeAtual));
        
         require_once  "../App/Views/".$classeAtual."/".$this->view->page.".phtml";
    }

}


?>