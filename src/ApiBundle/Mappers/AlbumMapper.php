<?php

namespace ApiBundle\Mappers;


use ApiBundle\Entity\Album as AlbumEntity;
use ApiBundle\DTO\Album as AlbumDTO;

class AlbumMapper extends AbstractMapper
{
    /** @var MapperInterface */
    private $genreMapper;

    public function __construct(MapperInterface $genreMapper)
    {
        $this->genreMapper = $genreMapper;
    }

    /**
     * Function to transform Entity to DTO
     * @param $entity AlbumEntity The Entity to transform to a DTO
     * @return AlbumDTO The DTO with data from the Entity
     */
    public function entityToDto($entity)
    {
        $albumDTO = new AlbumDTO();
        $albumDTO->setId($entity->getId())
            ->setName($entity->getName())
            ->setYear($entity->getYear())
            ->setGenre($this->genreMapper->entityToDto($entity->getGenre()))
            ->setFile($entity->getFile())
            ->setCover($entity->getCover());

        return $albumDTO;
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
