<?php 
include(".././models/mdlPedido.php");
class ctrlPedido extends mdlPedido{
    public function getPedidos($status){
        return mdlPedido::getPedidos($status);
    }
}


?>