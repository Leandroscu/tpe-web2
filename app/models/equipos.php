<?php

class EquiposModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de equipos completa.
     */
    public function getAllEquipos() {

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM equipos ORDER BY id_categoria DESC");
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

    public function filtrar($id){
        $query = $this->db->prepare("SELECT a.*,b.* FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria WHERE b.id_categoria = ? ORDER BY nombre ASC");
        $query->execute([$id]);
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    function showEquipo($equipo = null) {
        $equipo = getAllEquipos();
        $selectedEquipo = getEquipoById($equipos);
    }

    function getClubById($id){
        $query = $this->db->prepare("SELECT a.*,b.* FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria WHERE b.id_categoria = ? ORDER BY nombre ASC");
        $query->execute([$id]);
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    // function getEquipoInformacion($id){
    //     $query = $this->db->prepare('SELECT a.*,b.* FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria WHERE b.id_categoria = ?');
    //     $query->execute(array($id));
    //     $equipo = $query->fetch(PDO::FETCH_OBJ);
    //     return $equipo;
    // }

}