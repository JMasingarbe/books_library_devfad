<?php
include '../vendor/autoload.php';

session_start();

//récupération de l'URL (composante)
$url = parse_url($_SERVER["REQUEST_URI"]);

//extraction du path
$path = isset($url["path"]) ? $url["path"] : "/";

//importer les variables d'environnement 
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

//importer
use App\Controller\CategoryController;

//instancier les controllers
$categoryController = new CategoryController();


//test des valeurs du path
switch ($path) {
    case '/':
        echo "Home";
        break;
    case '/register':
        echo "register";
        break;
    case '/add_category' :
        $categoryController->addCategory();
        break;
    default:
        echo "Erreur 404";
        break;
}
