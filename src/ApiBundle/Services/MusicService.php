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

    public function __construct(EntityManager $entityManager, MusicMapper $musicMapper)
    {
        $this->entityManager = $entityManager;
        $this->musicRepository = $entityManager->getRepository('ApiBundle:Music');
        $this->musicMapper = $musicMapper;
    }

    public function getAllMusics() {
        $albumEntities = $this->musicRepository->findAll();
        if ($albumEntities === null) {
            throw new MusicNotFoundException();
        }

        return $this->musicMapper->entitiesListToDtoList($albumEntities);
    }
}
