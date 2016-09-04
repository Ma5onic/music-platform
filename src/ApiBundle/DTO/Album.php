<?php

namespace ApiBundle\DTO;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Album
{
    /**
     * The numeric identifier of the album
     * @var int
     *
     * @Serializer\ReadOnly(readOnly=true)
     * @Serializer\Type("integer")
     */
    private $id;

    /**
     * The genre of the album
     * @var Genre
     *
     * @Serializer\Type("ApiBundle\DTO\Genre")
     *
     * @Assert\Type(type="ApiBundle\DTO\Genre")
     */
    private $genre;

    /**
     * The name of the album
     * @var string
     *
     * @Serializer\Type("string")
     *
     * @Assert\Type(type="string")
     */
    private $name;

    /**
     * The year when the album was released
     * @var string
     *
     * @Serializer\Type("DateTime")
     *
     * @Assert\Type(type="DateTime")
     */
    private $year;

    /**
     * The location of the album on the server
     * @var string
     *
     * @Serializer\Type("string")
     *
     * @Assert\Type(type="string")
     */
    private $file;


    /**
     * The location of the cover of the album
     * @var string
     *
     * @Serializer\Type("string")
     *
     * @Assert\Type(type="string")
     */
    private $cover;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Album
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param Genre $genre
     * @return Album
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

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
     * @return Album
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param string $year
     * @return Album
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return Album
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     * @return Album
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }
}
