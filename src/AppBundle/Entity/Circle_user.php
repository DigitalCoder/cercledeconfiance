<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Circle_user
 *
 * @ORM\Table(name="circle_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Circle_userRepository")
 */
class Circle_user
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
     * @ORM\Column(name="admin_circle", type="boolean")
     */
    private $adminCircle;

    /**
     * @var bool
     *
     * @ORM\Column(name="circle_center", type="boolean")
     */
    private $circleCenter;

    /**
     * @var bool
     *
     * @ORM\Column(name="call_access", type="boolean")
     */
    private $callAccess;

    /**
     * @var bool
     *
     * @ORM\Column(name="wall_access", type="boolean")
     */
    private $wallAccess;

    /**
     * @var bool
     *
     * @ORM\Column(name="cloud_access", type="boolean")
     */
    private $cloudAccess;

    /**
     * @var bool
     *
     * @ORM\Column(name="agenda_access", type="boolean")
     */
    private $agendaAccess;

    /**
     * @ORM\OneToMany(targetEntity="Object_entry", mappedBy="circle_user", cascade={"persist"})
     */
    private $object_entries;

    /**
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\User", inversedBy="circle_users", cascade={"persist"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Circle", inversedBy="circle_users", cascade={"persist"})
     */
    private $circle;

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
     * Set adminCircle
     *
     * @param boolean $adminCircle
     *
     * @return Circle_user
     */
    public function setAdminCircle($adminCircle)
    {
        $this->adminCircle = $adminCircle;

        return $this;
    }

    /**
     * Get adminCircle
     *
     * @return bool
     */
    public function getAdminCircle()
    {
        return $this->adminCircle;
    }

    /**
     * Set circleCenter
     *
     * @param boolean $circleCenter
     *
     * @return Circle_user
     */
    public function setCircleCenter($circleCenter)
    {
        $this->circleCenter = $circleCenter;

        return $this;
    }

    /**
     * Get circleCenter
     *
     * @return bool
     */
    public function getCircleCenter()
    {
        return $this->circleCenter;
    }

    /**
     * Set callAccess
     *
     * @param boolean $callAccess
     *
     * @return Circle_user
     */
    public function setCallAccess($callAccess)
    {
        $this->callAccess = $callAccess;

        return $this;
    }

    /**
     * Get callAccess
     *
     * @return bool
     */
    public function getCallAccess()
    {
        return $this->callAccess;
    }

    /**
     * Set wallAccess
     *
     * @param boolean $wallAccess
     *
     * @return Circle_user
     */
    public function setWallAccess($wallAccess)
    {
        $this->wallAccess = $wallAccess;

        return $this;
    }

    /**
     * Get wallAccess
     *
     * @return bool
     */
    public function getWallAccess()
    {
        return $this->wallAccess;
    }

    /**
     * Set cloudAccess
     *
     * @param boolean $cloudAccess
     *
     * @return Circle_user
     */
    public function setCloudAccess($cloudAccess)
    {
        $this->cloudAccess = $cloudAccess;

        return $this;
    }

    /**
     * Get cloudAccess
     *
     * @return bool
     */
    public function getCloudAccess()
    {
        return $this->cloudAccess;
    }

    /**
     * Set agendaAccess
     *
     * @param boolean $agendaAccess
     *
     * @return Circle_user
     */
    public function setAgendaAccess($agendaAccess)
    {
        $this->agendaAccess = $agendaAccess;

        return $this;
    }

    /**
     * Get agendaAccess
     *
     * @return bool
     */
    public function getAgendaAccess()
    {
        return $this->agendaAccess;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->object_entries = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add objectEntry
     *
     * @param \AppBundle\Entity\Object_entry $objectEntry
     *
     * @return Circle_user
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
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Circle_user
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set address
     *
     * @param \UserBundle\Entity\Address $address
     *
     * @return Circle_user
     */
    public function setAddress(\AppBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set circle
     *
     * @param \AppBundle\Entity\Circle $circle
     *
     * @return Circle_user
     */
    public function setCircle(\AppBundle\Entity\Circle $circle = null)
    {
        $this->circle = $circle;

        return $this;
    }

    /**
     * Get circle
     *
     * @return \AppBundle\Entity\Circle
     */
    public function getCircle()
    {
        return $this->circle;
    }
}
