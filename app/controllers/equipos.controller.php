<?php
require_once './app/models/equipos.model.php';
require_once './app/views/equipos.view.php';
require_once './app/helpers/auth.helper.php';

class EquipoController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new EquipoModel();
        $this->view = new EquipoView();

        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

    }

    public function showEquipos() {
        $equipos = $this->model->getAllEquipos();
        $categorias = $this->model->getAllCategorias();
        
        $this->view->showEquipos($equipos,$categorias);
        
    }

    
    function addEquipo() {
        // TODO: validar entrada de datos

        $nombre = $_POST['nombre'];
        $estadio = $_POST['estadio'];
        $txtImagen = $_FILES['txtImagen'];
        $categoria = $_POST['id_categoria'];

        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES['txtImagen']["name"]:"equipo.jpg";
        $tmpImagen = $_FILES['txtImagen']["tmp_name"]; 
        if ($tmpImagen!="") {
            move_uploaded_file($tmpImagen,"imagenes/".$nombreArchivo);
        }
        $id = $this->model->insertEquipo($nombre, $estadio, $nombreArchivo, $categoria);

        header("Location: " . BASE_URL. "listEquipos"); 
    }

   
    function deleteEquipo($id) {
        $this->model->deleteEquipoById($id);
        header("Location: " . BASE_URL."listEquipos");
    }

    function formEditEquipo($id){

        $equipo = $this->model->selectEquipoById($id);

        $this->view->showFormEdit($equipo);
    }

}