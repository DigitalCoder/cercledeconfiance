<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="model")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModelRepository")
 */
class Model
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
     * @ORM\Column(name="reference", type="string", length=45)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="doc_url", type="string", length=255)
     */
    private $docUrl;

    /**
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="models")
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity="Connected_object", mappedBy="model")
     */
    private $connected_objects;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="Type_object", inversedBy="models")
     */
    private $type_object;

    /**
     * @ORM\OneToMany(targetEntity="Object_entry", mappedBy="model")
     */
    private $object_entries;

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
     * Set reference
     *
     * @param string $reference
     *
     * @return Model
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Model
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set docUrl
     *
     * @param string $docUrl
     *
     * @return Model
     */
    public function setDocUrl($docUrl)
    {
        $this->docUrl = $docUrl;

        return $this;
    }

    /**
     * Get docUrl
     *
     * @return string
     */
    public function getDocUrl()
    {
        return $this->docUrl;
    }

    /**
     * Set brand
     *
     * @param \AppBundle\Entity\Brand $brand
     *
     * @return Model
     */
    public function setBrand(\AppBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \AppBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
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
     * @return Model
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

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Model
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set typeObject
     *
     * @param \AppBundle\Entity\Type_object $typeObject
     *
     * @return Model
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

    /**
     * Add objectEntry
     *
     * @param \AppBundle\Entity\Object_entry $objectEntry
     *
     * @return Model
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
}
