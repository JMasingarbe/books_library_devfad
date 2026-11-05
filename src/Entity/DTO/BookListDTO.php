<?php

namespace App\Entity\DTO;

/**
 * Class qui représente un livre affiché en mode liste
 */
final readonly class BookListDTO
{
    public function __construct(
        private string $title,
        private string $author,
        private string $cover,
        private array $categories
    ) {}
}
