<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type_object
 *
 * @ORM\Table(name="type_object")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Type_objectRepository")
 */
class Type_object
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
     * @ORM\Column(name="type", type="string", length=45)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="Object_entry", mappedBy="type_object")
     */
    private $object_entries;

    /**
     * @ORM\OneToMany(targetEntity="Connected_object", mappedBy="type_object")
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
     * Set type
     *
     * @param string $type
     *
     * @return Type_object
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->models = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add objectEntry
     *
     * @param \AppBundle\Entity\Object_entry $objectEntry
     *
     * @return Type_object
     */
    public function addObjectEntry(\AppBundle\Entity\Object_entry $objectEntry)
    {
        $this->object_entries[] = $objectEntry;

        return $this;
    }

    /**
     * Remove objectEntry
     *
     * @param \AppBundle\Entity\Object_entry $objectEntry
     */
    public function removeObjectEntry(\AppBundle\Entity\Object_entry $objectEntry)
    {
        $this->object_entries->removeElement($objectEntry);
    }

    /**
     * Get objectEntries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjectEntries()
    {
        return $this->object_entries;
    }

    /**
     * Add connectedObject
     *
     * @param \AppBundle\Entity\Connected_object $connectedObject
     *
     * @return Type_object
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
