<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @Assert\File(maxSize="20M")
     */
    private $file_name;

    /**
     * @ORM\OneToMany(targetEntity="Data_app", mappedBy="cloud")
     */
    private $data_apps;

    /**
     * @ORM\Column(name="file_type", type="string", length=255)
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
     * Set fileType
     *
     * @param string $fileType
     *
     * @return Cloud
     */
    public function setFileType($fileType)
    {
        $this->file_type = $fileType;

        return $this;
    }

    /**
     * Get fileType
     *
     * @return string
     */
    public function getFileType()
    {
        return $this->file_type;
    }
}
