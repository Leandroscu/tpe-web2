<?php

class CategoriaModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de equipos completa.
     */
    public function getAllCategorias() {

        // 2. ejecuto la sentencia (2 subpasos)
        $consulta = $this->db->prepare("SELECT * FROM categorias");
        $consulta->execute();

        // 3. obtengo los resultados
        $categorias = $consulta->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $categorias;
    }


    public function getCategoriaById($id) {

        // 2. ejecuto la sentencia (2 subpasos)
        $consulta = $this->db->prepare("SELECT `id_categoria`, `name_categoria`, `imagen` FROM `categorias` WHERE id_categoria = id_categoria");
        $consulta->execute();

        // 3. obtengo los resultados
        $categoria = $consulta->fetch(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $categoria;
    }

    /**
     * Inserta una categoria en la base de datos.
     */
    public function insertCategoria($nombre, $nombreArchivo) {
        if ($nombreArchivo){
            $pathImg = $this->uploadImage($nombreArchivo);


        $consulta = $this->db->prepare("INSERT INTO categorias (name_categoria, imagen) VALUES (?, ?)");
        $consulta->execute([$nombre, $nombreArchivo]);
        }else {
            $consulta = $this->db->prepare("INSERT INTO categorias (name_categoria, imagen) VALUES (?, ?)");
            $consulta->execute([$nombre]);
        }

        return $this->db->lastInsertId();
    }


    private function uploadImage(){
        $nombreArchivo = "img/" . uniqid(). "." . strtolower(pathinfo($_FILES['imagen']['name'],PATHINFO_EXTENSION));
        move_uploaded_file($pathImg, $filePath);
        return $filePath;
    }

    // Selecciona categoria

    public function selectCategoriaById($id) {
        $consulta = $this->db->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
        $consulta->execute([$id]);
        $categoria = $consulta->fetch(PDO::FETCH_LAZY);
        $nombre = $categoria['nombre'];
        $imagen = $categoria['imagen'];
        return $categoria;
    }

    // Actualizar una categoria

    // public function actCategoria($nombre){
    //         $consulta = $this->db->prepare("UPDATE categorias SET name_categoria=? WHERE id_categoria = ?");
    //         $consulta->execute[$nombre];
    //         $nombre = $categoria['nombre'];
        
    //         header("Location: " . BASE_URL . "categoriaList");
    // }

    public function editCategoria($nombre,$id){
        $consulta = $this->db->prepare('UPDATE categorias SET name_categoria=? WHERE id_categoria=?');
        $consulta->execute([$nombre,$id]);
        header("Location: " . BASE_URL . "categoriaList");
    }


    /**
     * Elimina un equipo dado su id.
     */
    function deleteCategoriaById($id) {
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$id]);
    }

    

}