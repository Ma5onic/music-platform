<?php

namespace ApiBundle\Mappers;

/**
 * Interface MapperInterface
 * @package ApiBundle\Mappers
 */
interface MapperInterface
{
    /**
     * Function to transform Entity to DTO
     * @param $entity mixed The Entity to transform to a DTO
     * @return mixed The DTO with data from the Entity
     */
    public function entityToDto($entity);

    /**
     * Function to transform DTO to Entity
     * @param $dto mixed The DTO to transform to an Entity
     * @return mixed The Entity with data from the DTO
     */
    public function dtoToEntity($dto);
}
