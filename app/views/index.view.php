<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class HomeView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showHome($categorias) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($categorias)); 
        $this->smarty->assign('categorias', $categorias);

        // mostrar el tpl
        $this->smarty->display('categoriasCard.tpl');
    }

}