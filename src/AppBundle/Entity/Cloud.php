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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Data_app", mappedBy="cloud")
     */
    private $data_apps;

    /**
     * @ORM\ManyToOne(targetEntity="Upload", inversedBy="clouds")
     */
    private $upload;

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
     * @return Cloud
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
     * Set upload
     *
     * @param \AppBundle\Entity\Upload $upload
     *
     * @return Cloud
     */
    public function setUpload(\AppBundle\Entity\Upload $upload = null)
    {
        $this->upload = $upload;

        return $this;
    }

    /**
     * Get upload
     *
     * @return \AppBundle\Entity\Upload
     */
    public function getUpload()
    {
        return $this->upload;
    }
}
