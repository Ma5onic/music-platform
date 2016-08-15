<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Format
 *
 * @ORM\Table(name="format")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\FormatRepository")
 */
class Format
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
     * @ORM\Column(name="mediaType", type="string", length=255, unique=true)
     */
    private $mediaType;

    /**
     * @var array
     *
     * @ORM\Column(name="extensions", type="array", unique=true)
     */
    private $extensions;

    /**
     * @var Music
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\Music", mappedBy="format")
     */
    private $musics;


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
     * Set mediaType
     *
     * @param string $mediaType
     *
     * @return Format
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * Get mediaType
     *
     * @return string
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * Set extensions
     *
     * @param array $extensions
     *
     * @return Format
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * Get extensions
     *
     * @return array
     */
    public function getExtensions()
    {
        return $this->extensions;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->musics = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add music
     *
     * @param \ApiBundle\Entity\Music $music
     *
     * @return Format
     */
    public function addMusic(\ApiBundle\Entity\Music $music)
    {
        $this->musics[] = $music;

        return $this;
    }

    /**
     * Remove music
     *
     * @param \ApiBundle\Entity\Music $music
     */
    public function removeMusic(\ApiBundle\Entity\Music $music)
    {
        $this->musics->removeElement($music);
    }

    /**
     * Get musics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMusics()
    {
        return $this->musics;
    }
}
