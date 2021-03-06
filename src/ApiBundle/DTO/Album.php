<?php

namespace ApiBundle\DTO;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Album
 * @package ApiBundle\DTO
 */
class Album
{
    /**
     * The numeric identifier of the album.
     * @var int
     *
     * @Serializer\ReadOnly(readOnly=true)
     * @Serializer\Type("integer")
     * @Serializer\Since("1.0.0")
     */
    private $id;

    /**
     * The name of the album.
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @Assert\Type(type="string")
     */
    private $name;

    /**
     * The year when the album was released.
     * @var string
     *
     * @Serializer\Type("DateTime")
     * @Serializer\Since("1.0.0")
     *
     * @Assert\Type(type="DateTime")
     */
    private $year;

    /**
     * The location of the album on the server.
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @Assert\Type(type="string")
     */
    private $file;


    /**
     * The location of the cover of the album.
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @Assert\Type(type="string")
     */
    private $cover;

    /**
     * The musics of the album.
     * @var array<Music>
     *
     * @Serializer\Type("array<ApiBundle\DTO\Music>")
     * @Serializer\Since("1.0.0")
     *
     * @Assert\Type(type="array<ApiBundle\DTO\Music>")
     */
    private $musics;

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

    /**
     * @return array
     */
    public function getMusics()
    {
        return $this->musics;
    }

    /**
     * @param array $musics
     * @return Album
     */
    public function setMusics($musics)
    {
        $this->musics = $musics;

        return $this;
    }
}
