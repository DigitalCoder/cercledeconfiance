<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agenda
 *
 * @ORM\Table(name="agenda")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgendaRepository")
 */
class Agenda
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="event", type="text")
     */
    private $event;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_start", type="datetime")
     */
    private $eventStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_end", type="datetime")
     */
    private $eventEnd;

    /**
     * @ORM\OneToMany(targetEntity="DataApp", mappedBy="agenda")
     */
    private $data_apps;

    /**
     * @ORM\ManyToOne(targetEntity="CategoryEvent", inversedBy="agendas")
     */
    private $category_event;


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
     * Set name
     *
     * @param string $name
     *
     * @return Agenda
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set event
     *
     * @param string $event
     *
     * @return Agenda
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set eventStart
     *
     * @param \DateTime $eventStart
     *
     * @return Agenda
     */
    public function setEventStart($eventStart)
    {
        $this->eventStart = $eventStart;

        return $this;
    }

    /**
     * Get eventStart
     *
     * @return \DateTime
     */
    public function getEventStart()
    {
        return $this->eventStart;
    }

    /**
     * Set eventEnd
     *
     * @param \DateTime $eventEnd
     *
     * @return Agenda
     */
    public function setEventEnd($eventEnd)
    {
        $this->eventEnd = $eventEnd;

        return $this;
    }

    /**
     * Get eventEnd
     *
     * @return \DateTime
     */
    public function getEventEnd()
    {
        return $this->eventEnd;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->data_apps = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dataApp
     *
     * @param \AppBundle\Entity\DataApp $dataApp
     *
     * @return Agenda
     */
    public function addDataApp(\AppBundle\Entity\DataApp $dataApp)
    {
        $this->dataApps[] = $dataApp;

        return $this;
    }

    /**
     * Remove dataApp
     *
     * @param \AppBundle\Entity\DataApp $dataApp
     */
    public function removeDataApp(\AppBundle\Entity\DataApp $dataApp)
    {
        $this->data_apps->removeElement($dataApp);
    }

    /**
     * Get dataApps
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDataApps()
    {
        return $this->data_apps;
    }

    /**
     * Set categoryEvent
     *
     * @param \AppBundle\Entity\CategoryEvent $categoryEvent
     *
     * @return Agenda
     */
    public function setCategoryEvent(\AppBundle\Entity\CategoryEvent $categoryEvent = null)
    {
        $this->categoryEvent = $categoryEvent;

        return $this;
    }

    /**
     * Get categoryEvent
     *
     * @return \AppBundle\Entity\CategoryEvent
     */
    public function getCategoryEvent()
    {
        return $this->category_event;
    }
}
