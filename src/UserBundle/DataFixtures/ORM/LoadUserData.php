<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 30/05/17
 * Time: 11:26
 */

namespace UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUserData extends FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user0 = new User();
        $user0->setUsername('admin');
        $user0->setPassword('admin');
        $user0->setEmail('julienmartin.opto@gmail.com');
        $user0->setRoles(['ROLE_SUPER_ADMIN']);
        $user0->setAvatar('http://icons.iconarchive.com/icons/mattahan/ultrabuuf/256/Comics-Mask-icon.png');
        $user0->setName('Martin');
        $user0->setFirstname('Julien');
        $user0->setRelation('Dev');
        $user0->setPhoneNumber(0650730766);
        $user0->setAddress('12 rue des champignons 45000 orléans');

        $manager->persist($user0);
        $manager->flush();
    }
}