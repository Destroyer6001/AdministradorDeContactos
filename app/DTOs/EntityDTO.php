<?php

namespace App\DTOs;

use App\Models\Entity as ModelsEntity;


class EntityDTO
{
    public function __construct(public int $id, public string $name, public string $description)
    {
        
    }

    public static function FromModel(ModelsEntity $entity): self
    {
        return new self($entity->id, $entity->name, $entity->description);
    }

    public static function Collection($entities)
    {
        return $entities->map(fn ($entity) => self::FromModel($entity));
    }
}