<?php

namespace App\Entity;

class Category
{
    private int $id;
    private string $name;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setId(int $id): void {
         $this->id = $id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    // Méthode
    public static function hydrate(array $data): Category 
    {
        $newCategory = new Category($data["category_name"]);
        $newCategory->setId($data["id_category"]);
        return $newCategory;
    }
}