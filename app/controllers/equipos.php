<?php
require_once './app/models/equipos.php';
require_once './app/views/equipos.php';

class EquiposController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new EquiposModel();
        $this->view = new EquiposView();
    }

    public function showListaEquipos($club = null) {
        
        $equipos = $this->model->getAllEquipos();
        $categorias = $this->model->getAllCategorias();
        $selectedClub = $this->model->getClubById($club);

        $this->view->showListaEquipos($equipos,$categorias);        
    }

    public function filtrar($id){
        $equipos = $this->model->filtrar($id);
        $this->view->filtrarEquipo($equipos);
    }

    // function showEquipo($id){
    //     $equipoInfo = $this->model->getEquipoInformacion($id);
    //     $this->view->showEquipo($equipoInfo);
    // }
}