<?php

class EquipoModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de equipos completa.
     */
    public function getAllEquipos() {

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM equipos JOIN categorias ON equipos.id_categoria=categorias.id_categoria");
        $query->execute();

        // 3. obtengo los resultados
        $equipos = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $equipos;
    }


    public function getAllCategorias() {

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();

        // 3. obtengo los resultados
        $categorias = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $categorias;
    }

    /**
     * Inserta un equipo en la base de datos.
     */
    public function insertEquipo($nombre, $estadio, $nombreArchivo, $categoria) {
        if ($nombreArchivo) {
                $pathImg = $this->uploadImage($nombreArchivo);

            $consulta = $this->db->prepare("INSERT INTO equipos (nombre, estadio, imagen, id_categoria) VALUES (?, ?, ?, ?)");
            $consulta->execute([$nombre, $estadio, $nombreArchivo, $categoria]);
        }else {
            $consulta = $this->db->prepare("INSERT INTO equipos (nombre, estadio, id_categoria) VALUES ( ?, ?, ?)");
            $consulta->execute([$nombre, $estadio, $categoria]);
        }

        return $this->db->lastInsertId();
    }

    private function uploadImage(){
        $nombreArchivo = "imagenes/" . uniqid(). "." . strtolower(pathinfo($_FILES['txtImagen']['name'],PATHINFO_EXTENSION));
        move_uploaded_file($pathImg, $filePath);
        return $filePath;
    }

    // Selecciona equipo

    function seleccionarEquipoById($id) {
        $query = $this->db->prepare('SELECT * FROM equipos WHERE id_equipo = ?');
        $query->execute([$id]);
    }


    /**
     * Elimina un equipo dado su id.
     */
    function deleteEquipoById($id) {
        $query = $this->db->prepare('DELETE FROM equipos WHERE id_equipo = ?');
        $query->execute([$id]);
    }

}


