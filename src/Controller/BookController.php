<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Service\BookService;
use App\Service\CategoryService;

class BookController extends AbstractController
{
    private BookService $bookService;
    private CategoryService $categoryServices;

    public function __construct()
    {
        $this->bookService = new BookService();
        $this->categoryServices = new CategoryService();
    }
    
    public function addBook(): mixed
    {

        //Récupération des categories
        $data["categories"] = $this->categoryServices->getAllCategories();

        //Test si non connecté
        if (!isset($_SESSION["user"]["id"])) {
            //redirection vers la route de connexion
            header('Location:/login');
            exit;
        }

        //Test si le formulaire est soumis
        if ($this->isFormSubmitted($_POST)) {
            //Traitement en BDD de l'ajout du livre
            $data["msg"] = $this->bookService->insertBook();
        }

        return $this->render('add_book', 'Ajouter un livre', $data ?? []);
    }
}
