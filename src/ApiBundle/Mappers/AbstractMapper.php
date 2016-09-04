<?php

namespace ApiBundle\Mappers;

/**
 * Class AbstractMapper
 * @package ApiBundle\Mappers
 */
abstract class AbstractMapper implements MapperInterface
{
    /**
     * @param array $entities
     * @return array
     */
    public function entitiesListToDtoList(array $entities)
    {
        $dtoList = [];

        foreach ($entities as $entity) {
            $dtoList[] = $this->entityToDto($entity);
        }

        return $dtoList;
    }
}
