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
}

