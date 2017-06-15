<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FileType
 *
 * @ORM\Table(name="file_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FileTypeRepository")
 */
class FileType
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Cloud", mappedBy="fileType")
     */
    private $clouds;

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
     * Set name
     *
     * @param string $name
     *
     * @return FileType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->uploads = new \Doctrine\Common\Collections\ArrayCollection();
    }

     /**
     * Add cloud
     *
     * @param \AppBundle\Entity\Cloud $cloud
     *
     * @return FileType
     */
    public function addCloud(\AppBundle\Entity\Cloud $cloud)
    {
        $this->clouds[] = $cloud;

        return $this;
    }

    /**
     * Remove cloud
     *
     * @param \AppBundle\Entity\Cloud $cloud
     */
    public function removeCloud(\AppBundle\Entity\Cloud $cloud)
    {
        $this->clouds->removeElement($cloud);
    }

    /**
     * Get clouds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClouds()
    {
        return $this->clouds;
    }
}
