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
    private $file_name;

    /**
     * @ORM\OneToMany(targetEntity="Data_app", mappedBy="cloud")
     */
    private $data_apps;

    /**
     * @ORM\ManyToOne(targetEntity="File_type", inversedBy="clouds")
     */
    private $file_type;

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
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;

        return $this;
    }

    /**
     * Get file_name
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->file_name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->data_apps = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dataApp
     *
     * @param \AppBundle\Entity\Data_app $dataApp
     *
     * @return Cloud
     */
    public function addDataApp(\AppBundle\Entity\Data_app $dataApp)
    {
        $this->data_apps[] = $dataApp;

        return $this;
    }

    /**
     * Remove dataApp
     *
     * @param \AppBundle\Entity\Data_app $dataApp
     */
    public function removeDataApp(\AppBundle\Entity\Data_app $dataApp)
    {
        $this->data_apps->removeElement($dataApp);
    }

    /**
     * Get dataApps
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDataApps()
    {
        return $this->data_apps;
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
     * @param \AppBundle\Entity\File_type $fileType
     *
     * @return Cloud
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
