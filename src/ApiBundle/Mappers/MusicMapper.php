<?php

namespace ApiBundle\Mappers;

use ApiBundle\DTO\Music as MusicDTO;
use ApiBundle\Entity\Music as MusicEntity;

class MusicMapper extends AbstractMapper
{

    /**
     * Function to transform Entity to DTO
     * @param $entity MusicEntity The Entity to transform to a DTO
     * @return MusicDTO The DTO with data from the Entity
     */
    public function entityToDto($entity)
    {
        $musicDTO = new MusicDTO();
        $musicDTO->setId($entity->getId())
            ->setTitle($entity->getTitle())
            ->setFileName($entity->getFileName())
            ->setMimeType($entity->getMimeType());

        if ($entity->getAlbum() != null) {
            $musicDTO->setAlbumId($entity->getAlbum()->getId());
        } else {
            $musicDTO->setAlbumId(null);
        }

        return $musicDTO;
    }

    /**
     * Function to transform DTO to Entity
     * @param $dto MusicDTO The DTO to transform to an Entity
     * @return MusicEntity The Entity with data from the DTO
     */
    public function dtoToEntity($dto)
    {
        return null;
    }
}
