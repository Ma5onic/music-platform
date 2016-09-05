<?php

namespace ApiBundle\Services;

use ApiBundle\DTO\User as UserDTO;
use ApiBundle\Exceptions\UserNotFoundException;
use ApiBundle\Mappers\MapperInterface;
use ApiBundle\Mappers\UserMapper;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;


class UserService
{
    /** @var EntityManager */
    private $entityManager;

    /** @var EntityRepository */
    private $userRepository;

    /** @var UserMapper */
    private $userMapper;

    /**
     * UserService constructor.
     * @param EntityManager $entityManager Entity manager to get the repository.
     * @param MapperInterface $userMapper The mapper to transform an Entity onto a DTO.
     */
    public function __construct(EntityManager $entityManager, MapperInterface $userMapper)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $entityManager->getRepository('ApiBundle:User');
        $this->userMapper = $userMapper;
    }

    /**
     * @param $id integer The numeric identifier of the User to get.
     * @return UserDTO The DTO build with data that  match the numeric identifier.
     */
    public function getUser($id) {
        $userEntity = $this->userRepository->find($id);
        if ($userEntity === null) {
            throw new UserNotFoundException();
        }

        return $this->userMapper->entityToDto($userEntity);
    }

    /**
     * @return array<UserDTO>
     */
    public function getAllUsers()
    {
        $userEntities = $this->userRepository->findAll();
        if ($userEntities === null) {
            throw new UserNotFoundException();
        }

        return $this->userMapper->entitiesListToDtoList($userEntities);
    }
}
