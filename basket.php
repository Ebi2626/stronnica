<?php
class Basket {
    private $dbo = null;
    function_construct($dbo){
        $this->dbo = $dbo;

        if(!isset($_SESSION['basket'])){
            $_SESSION['basket'] = array();
        }
    }
    function add(){

    }
    function show($msg, $allowModify = true){

    }
    function modify(){

    }
    function saveOrder(){

    }
}

?>