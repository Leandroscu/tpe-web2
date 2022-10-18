<?php

class HomeModel {

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


}