<?php
require 'models/Erabiltzailea.php';
require 'models/Produktua.php';
require 'models/Eskaera.php';
require 'controllers/AuthController.php';
require 'controllers/HomeController.php';

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
    default:
        echo "index";
        break;
}
?>
