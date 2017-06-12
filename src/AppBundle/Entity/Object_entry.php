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
     * @ORM\ManyToOne(targetEntity="Circle_user", inversedBy="object_entries", cascade={"persist", "remove"})
     */
    private $circle_user;

    /**
     * @ORM\ManyToOne(targetEntity="Model", inversedBy="object_entries")
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
     * Set model
     *
     * @param \AppBundle\Entity\Model $model
     *
     * @return Object_entry
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
}
