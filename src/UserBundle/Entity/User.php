<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="relation", type="string", length=255)
     */
    private $relation;

    /**
     * @var int
     *
     * @ORM\Column(name="phone_number", type="integer")
     */
    private $phoneNumber;

    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Circle_user", mappedBy="user")
     */
    private $circle_users;

    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Data_app", mappedBy="user")
     */
    private $data_apps;




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
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set relation
     *
     * @param string $relation
     *
     * @return User
     */
    public function setRelation($relation)
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Get relation
     *
     * @return string
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return integer
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Add circleUser
     *
     * @param \AppBundle\Entity\Circle_user $circleUser
     *
     * @return User
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
     * Add dataApp
     *
     * @param \AppBundle\Entity\Data_app $dataApp
     *
     * @return User
     */
    public function addDataApp(\AppBundle\Entity\Data_app $dataApp)
    {
        $this->data_apps[] = $dataApp;

        return $this;
    }

    /**
     * Remove dataApp
     *
     * @param \AppBundle\Entity\Data_app $dataApp
     */
    public function removeDataApp(\AppBundle\Entity\Data_app $dataApp)
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
}
