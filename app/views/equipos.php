<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class EquiposView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showListaEquipos($equipos,$categorias) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($equipos)); 
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->assign('categorias', $categorias);

        // mostrar el tpl
        $this->smarty->display('equipos.tpl');
    }

    function filtrarEquipo($equipos){
        $this->smarty->assign("equipos", $equipos);
        $this->smarty->display("equiposFilter.tpl");
    }

    // public function showEquipo($equipoInfo) {
    //     // asigno variables al tpl smarty
    //     $this->smarty->assign('equipoInfo', $equipoInfo);
    //     // mostrar el tpl
    //     $this->smarty->display('verEquipo.tpl');
    // }

}