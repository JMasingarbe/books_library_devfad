<?php

namespace App\Service;

use App\Repository\CategoryRepository;
use App\Entity\Category;
use App\Utils\Tools;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    //injection de dépendance
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    /**
     * Méthode qui retourne la liste de toutes les categories
     * @return array<Category> $categories Tableau objet Category
     */
    public function getAllCategories(): array
    {
        return $this->categoryRepository->findAll();
    }

    /**
     * Méthode qui gére la logique d'ajout de categorie
     * @return string $message 
     */
    public function insertCategory(): string
    {
        //test si le champ est vide
        if (empty($_POST["category_name"])) {
            return "Veuillez remplir le nom de categorie";
        }
        
        //Nettoyage des données
        Tools::sanitizeArray($_POST);
        
        //Récupération de la catégorie
        $category = $this->categoryRepository->findByName($_POST["category_name"]);
        
        //test si la catégorie existe déja
        if ($category) {
            return "La categorie : " . $category->getName() .  " existe déja";
        }
        
        //Hydratation en Objet Category
        $newCategory = Category::hydrate($_POST);
        
        //Ajout en BDD
        $this->categoryRepository->create($newCategory);
        //$this->categoryRepository->create(new Category($_POST["category_name"]));

        return "La catégorie : " . $_POST["category_name"] . " a été ajouté avec succés";
    }
}
