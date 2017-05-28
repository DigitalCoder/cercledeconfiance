<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Circle
 *
 * @ORM\Table(name="circle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CircleRepository")
 */
class Circle
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
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var bool
     *
     * @ORM\Column(name="paid", type="boolean")
     */
    private $paid;

    /**
     * @ORM\ManyToOne(targetEntity="Offer", inversedBy="circles")
     */
    private $offer;

    /**
     * @ORM\OneToMany(targetEntity="Circle_user", mappedBy="circle")
     */
    private $circle_users;

    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="circles")
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="Data_app", inversedBy="circles")
     */
    private $data_app;

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
     * Set active
     *
     * @param boolean $active
     *
     * @return Circle
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set paid
     *
     * @param boolean $paid
     *
     * @return Circle
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return bool
     */
    public function getPaid()
    {
        return $this->paid;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->circle_users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set offer
     *
     * @param \AppBundle\Entity\Offer $offer
     *
     * @return Circle
     */
    public function setOffer(\AppBundle\Entity\Offer $offer = null)
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * Get offer
     *
     * @return \AppBundle\Entity\Offer
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Add circleUser
     *
     * @param \AppBundle\Entity\Circle_user $circleUser
     *
     * @return Circle
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
     * Set address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Circle
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
     * Set dataApp
     *
     * @param \AppBundle\Entity\Data_app $dataApp
     *
     * @return Circle
     */
    public function setDataApp(\AppBundle\Entity\Data_app $dataApp = null)
    {
        $this->data_app = $dataApp;

        return $this;
    }

    /**
     * Get dataApp
     *
     * @return \AppBundle\Entity\Data_app
     */
    public function getDataApp()
    {
        return $this->data_app;
    }
}