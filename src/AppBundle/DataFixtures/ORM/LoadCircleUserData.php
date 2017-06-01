<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 18:05
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Circle_user;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCircleUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $users = $manager->getRepository('UserBundle:User')->findAll();
        $circles = $manager->getRepository('AppBundle:Circle')->findAll();

        $circle_user0 = new Circle_user();
        $circle_user0->setCircle($circles[0]);
        $circle_user0->setUser($users[1]);
        $circle_user0->set
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }

}
