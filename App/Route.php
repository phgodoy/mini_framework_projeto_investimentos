<?php

namespace APP;

use MF\Init\Bootstrap;

class Route extends Bootstrap{
    
    //inicia as rodas paras as paginas
    protected function initRoutes(){
        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );

        $routes['sobre_nos'] = array(
            'route' => '/sobre_nos',
            'controller' => 'indexController',
            'action' => 'sobreNos'
        );

        $routes['exemplo'] = array(
            'route' => '/exemplo',
            'controller' => 'indexController',
            'action' => 'exemplo'
        );

        $routes['empresas'] = array(
            'route' => '/empresas',
            'controller' => 'indexController',
            'action' => 'empresas'
        );

        $routes['investidores'] = array(
            'route' => '/investidores',
            'controller' => 'indexController',
            'action' => 'investidores'
        );

        $routes['inscreverse'] = array(
            'route' => '/inscreverse',
            'controller' => 'indexController',
            'action' => 'inscreverse'
        );

        $routes['registrar'] = array(
            'route' => '/registrar',
            'controller' => 'indexController',
            'action' => 'registrar'
        );
        
        $routes['cadastro'] = array(
            'route' => '/cadastro',
            'controller' => 'indexController',
            'action' => 'cadastro'
        );

        $routes['login'] = array(
            'route' => '/login',
            'controller' => 'indexController',
            'action' => 'login'
        );

        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller' => 'indexController',
            'action' => 'autenticar'
        );

        $routes['timeline'] = array(
            'route' => '/timeline',
            'controller' => 'AppController',
            'action' => 'timeline'
        );

        $routes['sair'] = array(
            'route' => '/sair',
            'controller' => 'indexController',
            'action' => 'sair'
        );

        $this->setRoutes($routes);
    }

    

  

}

?>