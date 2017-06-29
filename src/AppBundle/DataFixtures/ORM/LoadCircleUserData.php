<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 18:05
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\CircleUser;
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

        $circleUser0 = new CircleUser();
        $circleUser0->setCircle($circles[0]);
        $circleUser0->setUser($users[5]);
        $manager->persist($circleUser0);

        $circleUser1 = new CircleUser();
        $circleUser1->setCircle($circles[0]);
        $circleUser1->setUser($users[1]);
        $circleUser1->setAdminCircle(1);
        $circleUser1->setCircleCenter(0);
        $manager->persist($circleUser1);

        $circleUser2 = new CircleUser();
        $circleUser2->setCircle($circles[0]);
        $circleUser2->setUser($users[3]);
        $circleUser2->setCircleCenter(0);
        $manager->persist($circleUser2);

        $circleUser3 = new CircleUser();
        $circleUser3->setCircle($circles[0]);
        $circleUser3->setUser($users[8]);
        $circleUser3->setCircleCenter(0);
        $manager->persist($circleUser3);

        $circleUser4 = new CircleUser();
        $circleUser4->setCircle($circles[0]);
        $circleUser4->setUser($users[4]);
        $circleUser4->setCloudAccess(0);
        $circleUser4->setWallAccess(0);
        $circleUser4->setCircleCenter(0);
        $manager->persist($circleUser4);

        $circleUser5 = new CircleUser();
        $circleUser5->setCircle($circles[0]);
        $circleUser5->setUser($users[6]);
        $circleUser5->setCircleCenter(0);
        $manager->persist($circleUser5);

        $circleUser6 = new CircleUser();
        $circleUser6->setCircle($circles[1]);
        $circleUser6->setUser($users[7]);
        $manager->persist($circleUser6);

        $circleUser7 = new CircleUser();
        $circleUser7->setCircle($circles[1]);
        $circleUser7->setUser($users[2]);
        $circleUser7->setAdminCircle(1);
        $circleUser7->setCircleCenter(0);
        $manager->persist($circleUser7);

        $circleUser8 = new CircleUser();
        $circleUser8->setCircle($circles[1]);
        $circleUser8->setUser($users[5]);
        $circleUser8->setCloudAccess(0);
        $circleUser8->setWallAccess(0);
        $circleUser8->setCircleCenter(0);
        $manager->persist($circleUser8);

        $circleUser9 = new CircleUser();
        $circleUser9->setCircle($circles[1]);
        $circleUser9->setUser($users[4]);
        $circleUser9->setCircleCenter(0);
        $manager->persist($circleUser9);

        $circleUser10 = new CircleUser();
        $circleUser10->setCircle($circles[1]);
        $circleUser10->setUser($users[10]);
        $circleUser10->setAgendaAccess(0);
        $circleUser10->setCircleCenter(0);
        $manager->persist($circleUser10);

        $circleUser11 = new CircleUser();
        $circleUser11->setCircle($circles[2]);
        $circleUser11->setUser($users[9]);
        $circleUser11->setAdminCircle(1);
        $manager->persist($circleUser11);

        $circleUser12 = new CircleUser();
        $circleUser12->setCircle($circles[2]);
        $circleUser12->setUser($users[2]);
        $circleUser12->setCloudAccess(0);
        $circleUser12->setWallAccess(0);
        $circleUser12->setCircleCenter(0);
        $manager->persist($circleUser12);

        $circleUser13 = new CircleUser();
        $circleUser13->setCircle($circles[2]);
        $circleUser13->setUser($users[6]);
        $circleUser13->setCircleCenter(0);
        $manager->persist($circleUser13);

        $circleUser14 = new CircleUser();
        $circleUser14->setCircle($circles[2]);
        $circleUser14->setUser($users[7]);
        $circleUser14->setCircleCenter(0);
        $manager->persist($circleUser14);

        $circleUser15 = new CircleUser();
        $circleUser15->setCircle($circles[3]);
        $circleUser15->setUser($users[10]);
        $manager->persist($circleUser15);

        $circleUser16 = new CircleUser();
        $circleUser16->setCircle($circles[3]);
        $circleUser16->setUser($users[1]);
        $circleUser16->setAdminCircle(1);
        $circleUser16->setCircleCenter(0);
        $manager->persist($circleUser16);

        $circleUser17 = new CircleUser();
        $circleUser17->setCircle($circles[3]);
        $circleUser17->setUser($users[3]);
        $circleUser17->setCloudAccess(0);
        $circleUser17->setWallAccess(0);
        $circleUser17->setAgendaAccess(0);
        $circleUser17->setCircleCenter(0);
        $manager->persist($circleUser17);
        
        $manager->flush();
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
