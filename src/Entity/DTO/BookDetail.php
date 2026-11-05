<?php

namespace App\Entity\DTO;

/**
 * Class qui représente un livre affiché en mode Détail
 */
final readonly class BookDetailDTO
{
    public function __construct(
        private string $title,
        private string $content,
        private string $publishAt,
        private string $author,
        private string $cover,
        private string $createdAt,
        private array $categories
    ) {}
}
