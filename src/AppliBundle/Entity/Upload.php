<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Upload
 *
 * @ORM\Table(name="upload")
 * @ORM\Entity(repositoryClass="AppliBundle\Repository\UploadRepository")
 */
class Upload
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Cloud", mappedBy="upload")
     */
    private $clouds;

    /**
     * @ORM\ManyToOne(targetEntity="File_type", inversedBy="uploads")
     */
    private $file_type;

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
     * Set url
     *
     * @param string $url
     *
     * @return Upload
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Upload
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
        $this->clouds = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cloud
     *
     * @param \AppBundle\Entity\Cloud $cloud
     *
     * @return Upload
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

    /**
     * Set fileType
     *
     * @param \AppBundle\Entity\File_type $fileType
     *
     * @return Upload
     */
    public function setFileType(\AppBundle\Entity\File_type $fileType = null)
    {
        $this->file_type = $fileType;

        return $this;
    }

    /**
     * Get fileType
     *
     * @return \AppBundle\Entity\File_type
     */
    public function getFileType()
    {
        return $this->file_type;
    }
}
