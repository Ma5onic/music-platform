<?php

namespace ApiBundle\Services;
use ApiBundle\DTO\User as UserDTO;
use ApiBundle\Exceptions\UserNotFoundException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;


class UserService
{
    /** @var EntityManager */
    private $entityManager;

    /** @var EntityRepository  */
    private $userRepository;

    /**
     * UserService constructor.
     * @param EntityManager $entityManager Entity manager to get the repository.
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $entityManager->getRepository('ApiBundle:User');
    }

    /**
     * @return array<UserDTO>
     */
    public function getAllUsers() {
        $userEntities = $this->userRepository->findAll();
        if ($userEntities === null) {
            throw new UserNotFoundException();
        }

        return UserDTO::fromEntitiesList($userEntities);
    }
}
