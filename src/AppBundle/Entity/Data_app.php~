<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Data_app
 *
 * @ORM\Table(name="data_app")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Data_appRepository")
 */
class Data_app
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
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity="Circle_user", inversedBy="data_apps")
     */
    private $circle_user;

    /**
     * @ORM\ManyToOne(targetEntity="Cloud", inversedBy="data_apps")
     */
    private $cloud;

    /**
     * @ORM\ManyToOne(targetEntity="Agenda", inversedBy="data_apps")
     */
    private $agenda;

    /**
     * @ORM\ManyToOne(targetEntity="Wall", inversedBy="data_apps")
     */
    private $wall;

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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Data_app
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->circles = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set cloud
     *
     * @param \AppBundle\Entity\Cloud $cloud
     *
     * @return Data_app
     */
    public function setCloud(\AppBundle\Entity\Cloud $cloud = null)
    {
        $this->cloud = $cloud;

        return $this;
    }

    /**
     * Get cloud
     *
     * @return \AppBundle\Entity\Cloud
     */
    public function getCloud()
    {
        return $this->cloud;
    }

    /**
     * Set agenda
     *
     * @param \AppBundle\Entity\Agenda $agenda
     *
     * @return Data_app
     */
    public function setAgenda(\AppBundle\Entity\Agenda $agenda = null)
    {
        $this->agenda = $agenda;

        return $this;
    }

    /**
     * Get agenda
     *
     * @return \AppBundle\Entity\Agenda
     */
    public function getAgenda()
    {
        return $this->agenda;
    }

    /**
     * Set wall
     *
     * @param \AppBundle\Entity\Wall $wall
     *
     * @return Data_app
     */
    public function setWall(\AppBundle\Entity\Wall $wall = null)
    {
        $this->wall = $wall;

        return $this;
    }

    /**
     * Get wall
     *
     * @return \AppBundle\Entity\Wall
     */
    public function getWall()
    {
        return $this->wall;
    }


    /**
     * Set circleUser
     *
     * @param \AppBundle\Entity\Circle_user $circleUser
     *
     * @return Data_app
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
