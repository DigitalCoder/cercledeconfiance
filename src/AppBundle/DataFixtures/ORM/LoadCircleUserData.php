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
        $circle_user0->setUser($users[5]);
        $manager->persist($circle_user0);

        $circle_user1 = new Circle_user();
        $circle_user1->setCircle($circles[0]);
        $circle_user1->setUser($users[1]);
        $circle_user1->setAdminCircle(1);
        $circle_user1->setCircleCenter(0);
        $manager->persist($circle_user1);

        $circle_user2 = new Circle_user();
        $circle_user2->setCircle($circles[0]);
        $circle_user2->setUser($users[3]);
        $circle_user2->setCircleCenter(0);
        $manager->persist($circle_user2);

        $circle_user3 = new Circle_user();
        $circle_user3->setCircle($circles[0]);
        $circle_user3->setUser($users[8]);
        $circle_user3->setCircleCenter(0);
        $manager->persist($circle_user3);

        $circle_user4 = new Circle_user();
        $circle_user4->setCircle($circles[0]);
        $circle_user4->setUser($users[4]);
        $circle_user4->setCloudAccess(0);
        $circle_user4->setWallAccess(0);
        $circle_user4->setCircleCenter(0);
        $manager->persist($circle_user4);

        $circle_user5 = new Circle_user();
        $circle_user5->setCircle($circles[0]);
        $circle_user5->setUser($users[6]);
        $circle_user5->setCircleCenter(0);
        $manager->persist($circle_user5);

        $circle_user6 = new Circle_user();
        $circle_user6->setCircle($circles[1]);
        $circle_user6->setUser($users[7]);
        $manager->persist($circle_user6);

        $circle_user7 = new Circle_user();
        $circle_user7->setCircle($circles[1]);
        $circle_user7->setUser($users[2]);
        $circle_user7->setAdminCircle(1);
        $circle_user7->setCircleCenter(0);
        $manager->persist($circle_user7);

        $circle_user8 = new Circle_user();
        $circle_user8->setCircle($circles[1]);
        $circle_user8->setUser($users[5]);
        $circle_user8->setCloudAccess(0);
        $circle_user8->setWallAccess(0);
        $circle_user8->setCircleCenter(0);
        $manager->persist($circle_user8);

        $circle_user9 = new Circle_user();
        $circle_user9->setCircle($circles[1]);
        $circle_user9->setUser($users[4]);
        $circle_user9->setCircleCenter(0);
        $manager->persist($circle_user9);

        $circle_user10 = new Circle_user();
        $circle_user10->setCircle($circles[1]);
        $circle_user10->setUser($users[10]);
        $circle_user10->setAgendaAccess(0);
        $circle_user10->setCircleCenter(0);
        $manager->persist($circle_user10);

        $circle_user11 = new Circle_user();
        $circle_user11->setCircle($circles[2]);
        $circle_user11->setUser($users[9]);
        $circle_user11->setAdminCircle(1);
        $manager->persist($circle_user11);

        $circle_user12 = new Circle_user();
        $circle_user12->setCircle($circles[2]);
        $circle_user12->setUser($users[2]);
        $circle_user12->setCloudAccess(0);
        $circle_user12->setWallAccess(0);
        $circle_user12->setCircleCenter(0);
        $manager->persist($circle_user12);

        $circle_user13 = new Circle_user();
        $circle_user13->setCircle($circles[2]);
        $circle_user13->setUser($users[6]);
        $circle_user13->setCircleCenter(0);
        $manager->persist($circle_user13);

        $circle_user14 = new Circle_user();
        $circle_user14->setCircle($circles[2]);
        $circle_user14->setUser($users[7]);
        $circle_user14->setCircleCenter(0);
        $manager->persist($circle_user14);

        $circle_user15 = new Circle_user();
        $circle_user15->setCircle($circles[3]);
        $circle_user15->setUser($users[10]);
        $manager->persist($circle_user15);

        $circle_user16 = new Circle_user();
        $circle_user16->setCircle($circles[3]);
        $circle_user16->setUser($users[1]);
        $circle_user16->setAdminCircle(1);
        $circle_user16->setCircleCenter(0);
        $manager->persist($circle_user16);

        $circle_user17 = new Circle_user();
        $circle_user17->setCircle($circles[3]);
        $circle_user17->setUser($users[3]);
        $circle_user17->setCloudAccess(0);
        $circle_user17->setWallAccess(0);
        $circle_user17->setAgendaAccess(0);
        $circle_user17->setCircleCenter(0);
        $manager->persist($circle_user17);
        
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
