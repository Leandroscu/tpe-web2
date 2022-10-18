<?php
require_once './app/models/index.model.php';
require_once './app/views/index.view.php';

class HomeController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new HomeModel();
        $this->view = new HomeView();
    }

    public function showHome() {
        $categorias = $this->model->getAllCategorias();
        
        $this->view->showHome($categorias);
        
    }

}