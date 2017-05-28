<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object_entry
 *
 * @ORM\Table(name="object_entry")
 * @ORM\Entity(repositoryClass="AppliBundle\Repository\Object_entryRepository")
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
    private $access;

    /**
     * @ORM\ManyToOne(targetEntity="Connected_object", inversedBy="object_entries")
     */
    private $connected_object;

    /**
     * @ORM\ManyToOne(targetEntity="Circle_user", inversedBy="object_entries")
     */
    private $circle_user;

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
     * Set connectedObject
     *
     * @param \AppBundle\Entity\Connected_object $connectedObject
     *
     * @return Object_entry
     */
    public function setConnectedObject(\AppBundle\Entity\Connected_object $connectedObject = null)
    {
        $this->connected_object = $connectedObject;

        return $this;
    }

    /**
     * Get connectedObject
     *
     * @return \AppBundle\Entity\Connected_object
     */
    public function getConnectedObject()
    {
        return $this->connected_object;
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
}
