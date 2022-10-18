<?php
require_once './app/models/categorias.model.php';
require_once './app/views/categorias.view.php';
require_once './app/helpers/auth.helper.php';

class CategoriaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();

        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

    }

    public function showCategorias() {
        
        $categorias = $this->model->getAllCategorias();
        
        $this->view->showCategorias($categorias);
        
    }

    function showFormEdit($id){

        $categoria = $this->model->selectCategoriaById($id);

        $this->view->showFormEdit($categoria);
    }

    public function getCategoriaById() {
        
        $categorias = $this->model->getCategoriaById($id);
        
        $this->view->selectCategoria($categorias);
    }

    public function showMore() {
        
        $categorias = $this->model->getCategoriaById($id);
        
        $this->view->selectCategoria($categorias);
    }

    
    public function addCategoria() {
        
        $nombre = $_POST['nombre'];
        $imagen = $_FILES['imagen'];
        $fecha = new DateTime();
        $nombreArchivo = ($imagen!="")?$fecha->getTimestamp()."_".$_FILES['imagen']["name"]:"categoria.jpg";
        $tmpImagen = $_FILES['imagen']["tmp_name"]; 
        if ($tmpImagen!="") {
            move_uploaded_file($tmpImagen,"img/".$nombreArchivo);
        }
        $id = $this->model->insertCategoria($nombre, $nombreArchivo);

        header("Location: " . BASE_URL . "categoriaList"); 
    }

    // public function updateCategoria($id){
    //     $nombre = $_POST['nombre'];
    //     $id = $this->model->actCategoria($nombre);
    // }

   
    function deleteCategoria($id) {
        $this->model->deleteCategoriaById($id);
        
        header("Location: ". BASE_URL."categoriaList");
    }

    public function selectCategoria($id){
        $this->model->getCategoriaById($id);
    }

    function editCategoria($id){
        $nombre = $_POST['nombre'];
        $this->model->editCategoria($nombre, $id);
    }
    

}