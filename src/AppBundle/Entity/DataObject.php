<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DataObject
 *
 * @ORM\Table(name="data_object")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DataObjectRepository")
 */
class DataObject
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
     * @ORM\Column(name="data", type="float")
     */
    private $data;

    /**
     * @ORM\OneToMany(targetEntity="ConnectedObject", mappedBy="dataObject")
     */
    private $connectedObjects;

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
     * @return DataObject
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
        $this->connectedObjects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add connectedObject
     *
     * @param \AppBundle\Entity\ConnectedObject $connectedObject
     *
     * @return DataObject
     */
    public function addConnectedObject(\AppBundle\Entity\ConnectedObject $connectedObject)
    {
        $this->connectedObjects[] = $connectedObject;

        return $this;
    }

    /**
     * Remove connectedObject
     *
     * @param \AppBundle\Entity\ConnectedObject $connectedObject
     */
    public function removeConnectedObject(\AppBundle\Entity\ConnectedObject $connectedObject)
    {
        $this->connectedObjects->removeElement($connectedObject);
    }

    /**
     * Get connectedObjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConnectedObjects()
    {
        return $this->connectedObjects;
    }
}
