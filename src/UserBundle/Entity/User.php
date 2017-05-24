<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 24/05/17
 * Time: 17:42
 */

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package UserBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}
