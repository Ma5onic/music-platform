<?php

namespace ApiBundle\DTO;


use JMS\Serializer\Annotation as Serializer;

class Music
{
    /**
     * The numeric identifier of the music in the database.
     * @var integer
     *
     * @Serializer\ReadOnly(readOnly=true)
     * @Serializer\Type(name="integer")
     */
    private $id;

    /**
     * The title of the music.
     * @var string
     *
     * @Serializer\Type(name="string")
     */
    private $title;

    /**
     * The file name of the music on the file system.
     * @var string
     *
     * @Serializer\Type(name="string")
     */
    private $fileName;

    /**
     * The MIME type of the file.
     * @var string
     *
     * @Serializer\Type(name="string")
     */
    private $mimeType;

    /**
     * The numeric identifier of the album the music is linked to.
     * @var integer
     *
     * @Serializer\Type(name="integer")
     */
    private $albumId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Music
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Music
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return Music
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return Music
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @return int
     */
    public function getAlbumId()
    {
        return $this->albumId;
    }

    /**
     * @param int $albumId
     * @return Music
     */
    public function setAlbumId($albumId)
    {
        $this->albumId = $albumId;

        return $this;
    }
}
