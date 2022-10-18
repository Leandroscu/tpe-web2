<?php
require_once './app/controllers/equipos.controller.php';
require_once './app/controllers/categorias.controller.php';
require_once './app/controllers/index.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/equipos.php';



define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {

    // Muestro el inicio
    case 'home':
        $homeController = new HomeController();
        $homeController->showHome();
        break;

    // Muestro el formulario de Login
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;
        
    // Valido los datos de Email y Contraseña
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;

    // Cierra el session_start()
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;

    // Muestro listado de equipos
    case 'equipos':
        $equiposController = new EquiposController();
        if (empty($params[1])) {
            $equiposController->showListaEquipos();
        } else {
            $equiposController->showListaEquipos($params[1]);
        }
        break;
    
    // Muestro una lista con los equipos y las categorias
    case 'categoriaList':
        $categoriaController = new CategoriaController();
        $categoriaController->showCategorias();
        break;

    case 'listEquipos':
        $equipoController = new EquipoController();
        $equipoController->showEquipos();
        break;

    // Agrego Categoria y equipo
    case 'agregar':
        $categoriaController = new CategoriaController();
        $categoriaController->addCategoria();
        break;

    case 'add':
        $equipoController = new EquipoController();
        $equipoController->addEquipo();
        break;

    // Eliminar Equipo y Categoria
    case 'delete':
        $id = $params[1];
        $equipoController = new EquipoController();
        $equipoController->deleteEquipo($id);
        break;

    case 'borrar':
        $id = $params[1];
        $categoriaController = new CategoriaController();
        $categoriaController->deleteCategoria($id);
        break;

    // Select Categoria
    case 'formModificar':

        $categoriaController = new CategoriaController();
        $categoriaController->showFormEdit($params[1]);
        break;

    // Actualizar Categoria
    case 'edit':
        $id = $params[1];
        $categoriaController = new CategoriaController();
        $categoriaController->editCategoria($id);
        break;

    case 'filtrar':
        $id = $params[1];
        $equiposController = new EquiposController();
        $equiposController->filtrar($id);
        break;

    // case 'ver':
    //     $equiposController = new EquiposController();
    //     $equiposController->showEquipo($params[1]);
    //     break;

    // case 'formEditEquipo':
    //     $id = $params[1];
    //     $equipoController = new EquipoController();
    //     $equipoController->formEditEquipo($id);
    //     break;

    // case 'editEquipo':
    //     $id = $params[1];
    //     $equipoController = new equipoController();
    //     $equipoController->editEquipo($id);
    //     break;


    // case 'updateEquipo':
    //     $id = $params[1];
    //     $EquipoController = new EquipoController();
    //     $EquipoController->updateEquipo();
    //     break;

    // Default

    // case 'equiposByCategoria':
    //         $equiposController = new EquiposController();
    //         $equiposController->showEquipoById($params[1]);
    //     break;
    
    default:
        echo('404 Page not found');
        break;
}

