<?php

namespace App\Entity\DTO;

use Mithridatem\Validation\Attributes\Length;
use Mithridatem\Validation\Attributes\NotBlank;
use Mithridatem\Validation\Attributes\Pattern;

/**
 * Class qui représente l'ajout en BDD d'un livre
 * avec les validations
 */
final readonly class AddBookDTO
{
    public function __construct(
        #[NotBlank]
        #[Length(min:2, max:50)]
        public ?string $title,
        #[NotBlank]
        #[Length(min:2, max:255)]
        public ?string $content,
        #[NotBlank]
        #[Pattern('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/D')]
        public ?string $publishAt,
        #[NotBlank]
        #[Length(min:2, max:200)]
        public ?string $author,
        public array $categories
    ) {}
}
