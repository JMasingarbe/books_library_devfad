<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Category;

<<<<<<< HEAD
class CategoryRepository {
    private \PDO $connection;

    public function __construct()
    {
        $this->connection = Mysql::connectBdd();
    }

    // Méthode :
    public function create(Category $category): ?Category {
        try {
            $sql = "INSERT INTO category (category_name) VALUE (?)";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $category->getName(), \PDO::PARAM_STR);

            $stmt->execute();

            $id = $this->connection->lastInsertId();

            $category->setId($id);

        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $category ?? null;
    }

    public function findByName(string $name): ?Category {
        try {
            $sql = "SELECT c.id_category, c.category_name FROM category AS c WHERE c.category_name = ?";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $name, \PDO::PARAM_STR);

            $stmt->execute();

            $data = $stmt->fetch();

            if ($data) {
                $category = Category::hydrate($data);
            }
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        return $category ?? null;
    }


    public function findAll(): array
    {
        try {
            $sql = "SELECT c.id_category, c.category_name FROM category AS c";

            $stmt = $this->connection->prepare($sql);

            $stmt->execute();

            $answers = $stmt->fetchAll();

            if ($answers) {
                foreach ($answers as $answer) {
                    $data[] = Category::hydrate($answer);
                }
=======
class CategoryRepository
{
    private \PDO $connexion;

    public function __construct()
    {
        $this->connexion = Mysql::connectBdd();
    }

    /**
     * Méthode pour ajouter une category en BDD
     * @param Category $category
     * @return Category $category + id 
     */
    public function create(Category $category): Category
    {
        try {
            $sql = "INSERT INTO category(category_name) VALUE(?)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(1, $category->getName());
            $stmt->execute();
            $id = $this->connexion->lastInsertId();
            $category->setId($id);
        } catch(\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $category;
    }

    /**
     * Méthode qui cherche une categorie par son nom
     * @param string $name nom de la catégorie cherchée
     * @return ?Category Objet Category trouvé ou null
     */
    public function findByName(string $name): ?Category
    {
         try {
            $sql = "SELECT c.id_category AS id, c.category_name FROM category AS c
            WHERE c.category_name = ?";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(1, $name, \PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
           if (isset($data) && $data != false) {
                $category = Category::hydrate($data);
            }
        } catch(\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $category ?? null;
    }

    /**
     * Méthode qui retourne toutes les categories
     * @return array<Category> $categories Tableau de Catégorie
     */
    public function findAll(): array
    {
        //Tableau de categorie Vide
        $categories = [];
        try {
            $sql = "SELECT c.id_category AS id, c.category_name FROM category As c
            ORDER by id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            //Boucle sur le tableau $data (résultat fetchAll)
            foreach ($data as $category) {
                //Hydratation en Tableau d'objet
                $categories[] = Category::hydrate($category);
>>>>>>> 9c0243437cb34a7e20e67ea9b957bbd31c897579
            }
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
<<<<<<< HEAD

        return $data ?? [];
=======
        return $categories;
>>>>>>> 9c0243437cb34a7e20e67ea9b957bbd31c897579
    }
}