<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class EquipoView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showEquipos($equipos,$categorias) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($equipos)); 
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->assign('categorias', $categorias);

        // mostrar el tpl
        $this->smarty->display('equiposList.tpl');
        

    }
}


