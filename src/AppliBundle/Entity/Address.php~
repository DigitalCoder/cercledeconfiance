<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="Circle_user", mappedBy="address")
     */
    private $circle_users;

    /**
     * @ORM\OneToMany(targetEntity="Circle", mappedBy="address")
     */
    private $circles;


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
     * Set address
     *
     * @param string $address
     *
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->circle_users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add circleUser
     *
     * @param \AppBundle\Entity\Circle_user $circleUser
     *
     * @return Address
     */
    public function addCircleUser(\AppBundle\Entity\Circle_user $circleUser)
    {
        $this->circle_users[] = $circleUser;

        return $this;
    }

    /**
     * Remove circleUser
     *
     * @param \AppBundle\Entity\Circle_user $circleUser
     */
    public function removeCircleUser(\AppBundle\Entity\Circle_user $circleUser)
    {
        $this->circle_users->removeElement($circleUser);
    }

    /**
     * Get circleUsers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCircleUsers()
    {
        return $this->circle_users;
    }

    /**
     * Add circle
     *
     * @param \AppBundle\Entity\Circle $circle
     *
     * @return Address
     */
    public function addCircle(\AppBundle\Entity\Circle $circle)
    {
        $this->circles[] = $circle;

        return $this;
    }

    /**
     * Remove circle
     *
     * @param \AppBundle\Entity\Circle $circle
     */
    public function removeCircle(\AppBundle\Entity\Circle $circle)
    {
        $this->circles->removeElement($circle);
    }

    /**
     * Get circles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCircles()
    {
        return $this->circles;
    }
}
