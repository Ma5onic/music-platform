<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Music
 *
 * @ORM\Table(name="music")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\MusicRepository")
 */
class Music
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var Album
     *
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Album", inversedBy="musics")
     */
    private $album;

    /**
     * @var string
     *
     * @ORM\Column(name="mime_type", type="string", length=255)
     */
    private $mimeType;

    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255)
     */
    private $fileName;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Music
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mimeType = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set album
     *
     * @param \ApiBundle\Entity\Album $album
     *
     * @return Music
     */
    public function setAlbum(\ApiBundle\Entity\Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return \ApiBundle\Entity\Album
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Add format
     *
     * @param \ApiBundle\Entity\Format $format
     *
     * @return Music
     */
    public function addFormat(\ApiBundle\Entity\Format $format)
    {
        $this->mimeType[] = $format;

        return $this;
    }

    /**
     * Remove format
     *
     * @param \ApiBundle\Entity\Format $format
     */
    public function removeFormat(\ApiBundle\Entity\Format $format)
    {
        $this->mimeType->removeElement($format);
    }

    /**
     * Get format
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMimeType()
    {
        return $this->mimeType;
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
     * Set format
     *
     * @param string $mimeType
     *
     * @return Music
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }
}
