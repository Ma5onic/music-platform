<?php

namespace ApiBundle\Services;


use ApiBundle\Exceptions\MusicNotFoundException;
use ApiBundle\Mappers\MusicMapper;
use ApiBundle\Repository\MusicRepository;
use Doctrine\ORM\EntityManager;

class MusicService
{
    /** @var EntityManager */
    private $entityManager;

    /** @var MusicRepository */
    private $musicRepository;

    /** @var MusicMapper */
    private $musicMapper;

    /**
     * MusicService constructor.
     * @param EntityManager $entityManager
     * @param MusicMapper $musicMapper The mapper
     */
    public function __construct(EntityManager $entityManager, MusicMapper $musicMapper)
    {
        $this->entityManager = $entityManager;
        $this->musicRepository = $entityManager->getRepository('ApiBundle:Music');
        $this->musicMapper = $musicMapper;
    }

    public function getMusic($id)
    {
        $musicEntity = $this->musicRepository->find($id);
        if ($musicEntity === null) {
            throw new MusicNotFoundException();
        }

        return $this->musicMapper->entityToDto($musicEntity);
    }

    public function getAllMusics()
    {
        $musicEntities = $this->musicRepository->findAll();
        if ($musicEntities === null) {
            throw new MusicNotFoundException();
        }

        return $this->musicMapper->entitiesListToDtoList($musicEntities);
    }
}
