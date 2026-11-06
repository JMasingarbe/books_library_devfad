<?php

namespace App\Controller;

use App\Controller\AbstractController;

class LendingController extends AbstractController
{

    public function borrowBook(): mixed
    {
        //Test si non connecté
        if (!isset($_SESSION["user"]["id"])) {
            //redirection vers la route de connexion
            header('Location:/login');
            exit;
        }
        
        //Test droit ROLE_USER
        if (($_SESSION["user"]["grant"] ?? '') != 'ROLE_USER') {
            http_response_code(403);
            return $this->render('error_403', '403');
        }

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            
            //redirection vers la route de l'accueil
            header('Allow:POST');
            http_response_code(405);
            header('Location:/');
        }

        if (!$this->isCsrfTokenValid($_POST)) {
            header('Location:/books');
            exit;
        }

        return $this->render('lending_result', 'Emprunt', $data = []);
    }
}