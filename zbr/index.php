<?php
require 'models/Erabiltzailea.php';
require 'models/Produktua.php';
require 'models/Eskaera.php';
require 'controllers/AuthController.php';
require 'controllers/HomeController.php';
require 'controllers/ProfilaController.php';

session_start();

$url = str_replace('/zbr', '', $_SERVER['REQUEST_URI']);

//Rutak ezarri
switch ($url) {
    case '/login':
        $controller = new AuthController();
        $controller->login();
        break;
    case '/logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case '/erregistratu'://Erregistratzeko view ireki
        $controller = new AuthController();
        $controller->erregistratu();
        break;
    case '/home':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/profila':
        $controller = new ProfilaController();
        $controller->profila();
        break;
    case (strpos($url, '/ezabatuProduktua') !== false):
        // Si la URL contiene 'ezabatuProduktua', obtenemos el ID desde la query string
        if (isset($_GET['id'])) {
            $controller = new ProfilaController();
            $controller->ezabatuProduktua($_GET['id']);
        }
        break;
    case (strpos($url, '/ezabatuErabiltzailea') !== false):
        // Si la URL contiene 'ezabatuProduktua', obtenemos el ID desde la query string
        if (isset($_GET['id'])) {
            $controller = new ProfilaController();
            $controller->ezabatuErabiltzailea($_GET['id']);
        }
        break;
    case (strpos($url, '/editatuProduktua') !== false):
        if (isset($_GET['id'])) {
            $controller = new ProfilaController();
            $controller->editatuProduktua($_GET['id']);
        }
        break;
    case (strpos($url, '/eguneratuProduktua') !== false):
        if (isset($_GET['id'])) {
            $controller = new ProfilaController();
            $controller->eguneratuProduktua($_GET['id']);
        }
        break;
    case (strpos($url, '/editatuErabiltzailea') !== false):
        if (isset($_GET['id'])) {
            $controller = new ProfilaController();
            $controller->editatuErabiltzailea($_GET['id']);
        }
        break;
    case (strpos($url, '/eguneratuErabiltzailea') !== false):
        if (isset($_GET['id'])) {
            $controller = new ProfilaController();
            $controller->eguneratuErabiltzailea($_GET['id']);
        }
        break;
    default:
        break;
}
?>
