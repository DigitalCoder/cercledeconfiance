<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cloud
 *
 * @ORM\Table(name="cloud")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CloudRepository")
 */
class Cloud
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
     * @ORM\Column(name="file_name", type="string", length=255)
     */
    private $fileName;

    /**
     * @ORM\OneToMany(targetEntity="DataApp", mappedBy="cloud")
     */
    private $dataApps;

    /**
     * @ORM\ManyToOne(targetEntity="FileType", inversedBy="clouds")
     */
    private $fileType;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

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
     * @param string $file_name
     *
     * @return Cloud
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get file_name
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dataApps = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dataApp
     *
     * @param \AppBundle\Entity\DataApp $dataApp
     *
     * @return Cloud
     */
    public function addDataApp(\AppBundle\Entity\DataApp $dataApp)
    {
        $this->dataApps[] = $dataApp;

        return $this;
    }

    /**
     * Remove dataApp
     *
     * @param \AppBundle\Entity\DataApp $dataApp
     */
    public function removeDataApp(\AppBundle\Entity\DataApp $dataApp)
    {
        $this->dataApps->removeElement($dataApp);
    }

    /**
     * Get dataApps
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDataApps()
    {
        return $this->dataApps;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Cloud
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
     * Set fileType
     *
     * @param \AppBundle\Entity\FileType $fileType
     *
     * @return Cloud
     */
    public function setFileType(\AppBundle\Entity\FileType $fileType = null)
    {
        $this->fileType = $fileType;

        return $this;
    }

    /**
     * Get fileType
     *
     * @return \AppBundle\Entity\FileType
     */
    public function getFileType()
    {
        return $this->fileType;
    }
}
