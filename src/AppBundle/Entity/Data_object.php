<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Data_object
 *
 * @ORM\Table(name="data_object")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Data_objectRepository")
 */
class Data_object
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
     * @ORM\Column(name="data", type="text")
     */
    private $data;

    /**
     * @ORM\OneToMany(targetEntity="Connected_object", mappedBy="data_object")
     */
    private $connected_objects;

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
     * Set data
     *
     * @param string $data
     *
     * @return Data_object
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->connected_objects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add connectedObject
     *
     * @param \AppBundle\Entity\Connected_object $connectedObject
     *
     * @return Data_object
     */
    public function addConnectedObject(\AppBundle\Entity\Connected_object $connectedObject)
    {
        $this->connected_objects[] = $connectedObject;

        return $this;
    }

    /**
     * Remove connectedObject
     *
     * @param \AppBundle\Entity\Connected_object $connectedObject
     */
    public function removeConnectedObject(\AppBundle\Entity\Connected_object $connectedObject)
    {
        $this->connected_objects->removeElement($connectedObject);
    }

    /**
     * Get connectedObjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConnectedObjects()
    {
        return $this->connected_objects;
    }
}
