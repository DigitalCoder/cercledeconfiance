<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConnectedObject
 *
 * @ORM\Table(name="connected_object")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Connected_objectRepository")
 */
class ConnectedObject
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
     * @ORM\ManyToOne(targetEntity="DataObject", inversedBy="connectedObjects", cascade={"all"}, fetch="EAGER")
     */
    private $dataObject;

    /**
     * @ORM\ManyToOne(targetEntity="Model", inversedBy="connectedObjects", cascade={"all"}, fetch="EAGER")
     */
    private $model;

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
     * Set dataObject
     *
     * @param \AppBundle\Entity\DataObject $dataObject
     *
     * @return ConnectedObject
     */
    public function setDataObject(\AppBundle\Entity\DataOject $dataObject = null)
    {
        $this->dataObject = $dataObject;

        return $this;
    }

    /**
     * Get dataObject
     *
     * @return \AppBundle\Entity\DataObject
     */
    public function getDataObject()
    {
        return $this->dataObject;
    }

    /**
     * Set model
     *
     * @param \AppBundle\Entity\Model $model
     *
     * @return ConnectedObject
     */
    public function setModel(\AppBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \AppBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->objectEntries = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
