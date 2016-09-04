<?php

namespace ApiBundle\DTO;


use JMS\Serializer\Annotation as Serializer;

/**
 * Class Genre
 * @package ApiBundle\DTO
 */
class Genre
{
    /**
     * The numeric identifier of the genre.
     * @var int
     *
     * @Serializer\ReadOnly(readOnly=true)
     */
    private $id;

    /**
     * The name of the genre.
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @return int The numeric identifier
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id The numeric identifier to set
     * @return Genre The actual
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Genre
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
