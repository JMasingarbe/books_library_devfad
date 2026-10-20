<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Category;

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
            }
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        return $data ?? [];
    }
}