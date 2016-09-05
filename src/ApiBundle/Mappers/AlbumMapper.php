<?php

namespace ApiBundle\Mappers;


use ApiBundle\DTO\Album as AlbumDTO;
use ApiBundle\Entity\Album as AlbumEntity;

class AlbumMapper extends AbstractMapper
{
    /** @var GenreMapper */
    private $genreMapper;

    /** @var MusicMapper */
    private $musicMapper;

    public function __construct(MapperInterface $genreMapper, MapperInterface $musicMapper)
    {
        $this->genreMapper = $genreMapper;
        $this->musicMapper = $musicMapper;
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
            ->setCover($entity->getCover())
            ->setMusics($this->musicMapper->entitiesListToDtoList($entity->getMusics()->toArray()));

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
