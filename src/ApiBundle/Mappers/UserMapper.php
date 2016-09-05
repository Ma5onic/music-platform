<?php

namespace ApiBundle\Mappers;


use ApiBundle\Entity\User as UserEntity;
use ApiBundle\DTO\User as UserDTO;

class UserMapper extends AbstractMapper
{

    /**
     * Function to transform Entity to DTO
     * @param $entity UserEntity The Entity to transform to a DTO
     * @return UserDTO The DTO with data from the Entity
     */
    public function entityToDto($entity)
    {
        $dto = new UserDTO();
        $dto->setId($entity->getId());
        $dto->setUsername($entity->getUsername());
        $dto->setLastName($entity->getLastName());
        $dto->setFirstName($entity->getFirstName());
        $dto->setEmail($entity->getEmail());
        $dto->setBiography($entity->getBiography());

        return $dto;
    }

    /**
     * Function to transform DTO to Entity
     * @param $dto mixed The DTO to transform to an Entity
     * @return mixed The Entity with data from the DTO
     */
    public function dtoToEntity($dto)
    {
        return null;
    }
}
