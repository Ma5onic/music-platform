<?php

namespace ApiBundle\Services;


use ApiBundle\Exceptions\AlbumNotFoundException;
use ApiBundle\Mappers\AlbumMapper;
use ApiBundle\Mappers\MapperInterface;
use ApiBundle\Repository\AlbumRepository;
use Doctrine\ORM\EntityManager;
use ApiBundle\DTO\Album as AlbumDTO;

class AlbumService
{
    /** @var AlbumMapper */
    private $mapper;

    /** @var AlbumRepository */
    private $albumRepository;

    /** @var EntityManager */
    private $entityManager;

    /**
     * AlbumService constructor.
     * @param EntityManager $entityManager Entity manager to get the repository.
     * @param MapperInterface $mapper the mapper used 
     */
    public function __construct(EntityManager $entityManager, MapperInterface $mapper)
    {
        $this->entityManager = $entityManager;
        $this->albumRepository = $entityManager->getRepository('ApiBundle:Album');
        $this->mapper = $mapper;
    }

    /**
     * @return array<AlbumDTO>
     */
    public function getAllAlbums() {
        $albumEntities = $this->albumRepository->findAll();
        if ($albumEntities === null) {
            throw new AlbumNotFoundException();
        }

        return $this->mapper->entitiesListToDtoList($albumEntities);
    }

    /**
     * @param $id integer The numeric identifier of the album to fetch.
     * @return AlbumDTO The album DTO
     */
    public function getAlbum($id) {
        $albumEntity = $this->albumRepository->find($id);
        if ($albumEntity === null) {
            throw new AlbumNotFoundException();
        }

        return $this->mapper->entityToDto($albumEntity);
    }
}
