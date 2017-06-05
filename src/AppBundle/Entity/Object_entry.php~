<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object_entry
 *
 * @ORM\Table(name="object_entry")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Object_entryRepository")
 */
class Object_entry
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
     * @var bool
     *
     * @ORM\Column(name="access", type="boolean")
     */
    private $access=0;

    /**
     * @ORM\ManyToOne(targetEntity="Circle_user", inversedBy="object_entries")
     */
    private $circle_user;

    /**
     * @ORM\ManyToOne(targetEntity="Type_object", inversedBy="object_entries")
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
     * Set access
     *
     * @param boolean $access
     *
     * @return Object_entry
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access
     *
     * @return bool
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set circleUser
     *
     * @param \AppBundle\Entity\Circle_user $circleUser
     *
     * @return Object_entry
     */
    public function setCircleUser(\AppBundle\Entity\Circle_user $circleUser = null)
    {
        $this->circle_user = $circleUser;

        return $this;
    }

    /**
     * Get circleUser
     *
     * @return \AppBundle\Entity\Circle_user
     */
    public function getCircleUser()
    {
        return $this->circle_user;
    }

    /**
     * Set typeObject
     *
     * @param \AppBundle\Entity\Type_object $typeObject
     *
     * @return Object_entry
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
