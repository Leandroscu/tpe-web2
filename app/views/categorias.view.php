<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';


class CategoriaView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showCategorias($categorias) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($categorias)); 
        $this->smarty->assign('categorias', $categorias);

        // mostrar el tpl
        $this->smarty->display('categoriasList.tpl');

    }

    function showFormEdit($categoria) {
        // asigno variables al tpl smarty
        $this->smarty->assign('categoria', $categoria); 

        // mostrar el tpl
        $this->smarty->display('modificar.tpl');

    }

}