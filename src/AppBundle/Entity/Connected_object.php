<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Connected_object
 *
 * @ORM\Table(name="connected_object")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Connected_objectRepository")
 */
class Connected_object
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
     * @ORM\ManyToOne(targetEntity="Data_object", inversedBy="connected_objects")
     */
    private $data_object;

    /**
     * @ORM\ManyToOne(targetEntity="Model", inversedBy="connected_objects")
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="Type_object", inversedBy="connected_objects")
     */
    private $type_object;

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
     * @param \AppBundle\Entity\Data_object $dataObject
     *
     * @return Connected_object
     */
    public function setDataObject(\AppBundle\Entity\Data_object $dataObject = null)
    {
        $this->data_object = $dataObject;

        return $this;
    }

    /**
     * Get dataObject
     *
     * @return \AppBundle\Entity\Data_object
     */
    public function getDataObject()
    {
        return $this->data_object;
    }

    /**
     * Set model
     *
     * @param \AppBundle\Entity\Model $model
     *
     * @return Connected_object
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
        $this->object_entries = new \Doctrine\Common\Collections\ArrayCollection();
    }



    /**
     * Set typeObject
     *
     * @param \AppBundle\Entity\Type_object $typeObject
     *
     * @return Connected_object
     */
    public function setTypeObject(\AppBundle\Entity\Type_object $typeObject = null)
    {
        $this->type_object = $typeObject;

        return $this;
    }

    /**
     * Get typeObject
     *
     * @return \AppBundle\Entity\Type_object
     */
    public function getTypeObject()
    {
        return $this->type_object;
    }
}
