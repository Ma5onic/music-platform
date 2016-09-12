<?php

namespace ApiBundle\DTO;


use ApiBundle\Entity\User as UserEntity;
use JMS\Serializer\Annotation as Serializer;

class User
{
    /**
     * The numeric identifier of the user.
     * @var int
     *
     * @Serializer\ReadOnly(readOnly=true)
     * @Serializer\Type("integer")
     * @Serializer\Since("1.0.0")
     */
    private $id;

    /**
     * The username of the user.
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     */
    private $username;

    /**
     * The last name of the user.
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     */
    private $lastName;

    /**
     * The first name of the user.
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     */
    private $firstName;

    /**
     * The password of the user.
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     */
    private $password;

    /**
     * The email address of the user.
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     */
    private $email;

    /**
     * The biography of the user.
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     */
    private $biography;

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
