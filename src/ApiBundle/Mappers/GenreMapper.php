<?php

namespace ApiBundle\Mappers;

use ApiBundle\DTO\Genre as GenreDTO;
use ApiBundle\Entity\Genre as GenreEntity;

class GenreMapper extends AbstractMapper
{
    /**
     * Function to transform Entity to DTO
     * @param $entity GenreEntity The Entity to transform to a DTO
     * @return GenreDTO The DTO with data from the Entity
     */
    public function entityToDto($entity)
    {
        $genreDTO = new GenreDTO();
        $genreDTO->setId($entity->getId())
            ->setName($entity->getName());

        return $genreDTO;
    }

    /**
     * Function to transform DTO to Entity
     * @param $dto GenreDTO The DTO to transform to an Entity
     * @return GenreEntity The Entity with data from the DTO
     */
    public function dtoToEntity($dto)
    {
        return null;
    }
}
