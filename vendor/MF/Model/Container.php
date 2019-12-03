<?php

namespace MF\Model;

//recurso da conexao
use App\Connection;

class Container{
    //retorna o modelo solicitado ja instanciado e a cenexao estabelecida ao banco
    public static function getModel($model){
        $class = "\\App\\Models\\".ucfirst($model);

        
        $conn = Connection::getDb();
        
        return new $class($conn);
        
    }
}

?>