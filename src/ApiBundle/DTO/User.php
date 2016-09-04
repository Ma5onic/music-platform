<?php

namespace ApiBundle\DTO;


use JMS\Serializer\Annotation as Serializer;
use ApiBundle\Entity\User as UserEntity;

class User
{
    /**
     * @var int
     *
     * @Serializer\ReadOnly(readOnly=true)
     * @Serializer\Type("integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $username;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $lastName;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $firstName;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $password;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $biography;

    /**
     * @param UserEntity $entity The User entity to cast into a User DTO
     * @return User A User DTO from the User entity.
     */
    public static function fromEntity(UserEntity $entity) {
        $dto = new User();
        $dto->setId($entity->getId());
        $dto->setUsername($entity->getUsername());
        $dto->setLastName($entity->getLastName());
        $dto->setFirstName($entity->getFirstName());
        $dto->setEmail($entity->getEmail());
        $dto->setBiography($entity->getBiography());

        return $dto;
    }

    /**
     * @param array $entities Entities to cast into a DTO.
     * @return array An array of User DTO from an entities list.
     */
    public static function fromEntitiesList(array $entities) {
        $dtoList = [];
        foreach ($entities as $entity) {
            $dtoList[] = static::fromEntity($entity);
        }

        return $dtoList;
    }

    /**
     * @return UserEntity The user entity from the DTO.
     */
    public function toEntity() {
        $entity = new UserEntity();
        $entity->setUsername($this->getUsername());
        $entity->setLastName($this->getLastName());
        $entity->setFirstName($this->getFirstName());
        $entity->setEmail($this->getEmail());
        $entity->setBiography($this->getBiography());

        return $entity;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    }
}
