<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 18:01
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\DataApp;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDataAppData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $clouds = $manager->getRepository('AppBundle:Cloud')->findAll();
        $agendas = $manager->getRepository('AppBundle:Agenda')->findAll();
        $walls = $manager->getRepository('AppBundle:Wall')->findAll();
        $circle_users = $manager->getRepository('AppBundle:CircleUser')->findAll();

        $dataApp0 = new DataApp();
        $dataApp0->setCloud($clouds[0]);
        $dataApp0->setCircleUser($circle_users[3]);
        $dataApp0->setCreationDate(new \DateTime('2017-05-29 18:37:52'));
        $manager->persist($dataApp0);

        $dataApp1 = new DataApp();
        $dataApp1->setCloud($clouds[1]);
        $dataApp1->setCircleUser($circle_users[9]);
        $dataApp1->setCreationDate(new \DateTime('2017-05-27 20:07:22'));
        $manager->persist($dataApp1);

        $dataApp2 = new DataApp();
        $dataApp2->setCloud($clouds[2]);
        $dataApp2->setCircleUser($circle_users[11]);
        $dataApp2->setCreationDate(new \DateTime('2017-05-20 11:32:24'));
        $manager->persist($dataApp2);

        $dataApp3 = new DataApp();
        $dataApp3->setAgenda($agendas[0]);
        $dataApp3->setCircleUser($circle_users[0]);
        $dataApp3->setCreationDate(new \DateTime('2017-06-09 16:07:12'));
        $manager->persist($dataApp3);

        $dataApp4 = new DataApp();
        $dataApp4->setAgenda($agendas[1]);
        $dataApp4->setCircleUser($circle_users[6]);
        $dataApp4->setCreationDate(new \DateTime('2017-04-29 17:12:52'));
        $manager->persist($dataApp4);

        $dataApp5 = new DataApp();
        $dataApp5->setAgenda($agendas[2]);
        $dataApp5->setCircleUser($circle_users[12]);
        $dataApp5->setCreationDate(new \DateTime('2017-05-29 06:33:46'));
        $manager->persist($dataApp5);

        $dataApp6 = new DataApp();
        $dataApp6->setAgenda($agendas[3]);
        $dataApp6->setCircleUser($circle_users[1]);
        $dataApp6->setCreationDate(new \DateTime('2017-05-28 16:07:12'));
        $manager->persist($dataApp6);

        $dataApp7 = new DataApp();
        $dataApp7->setWall($walls[0]);
        $dataApp7->setCircleUser($circle_users[5]);
        $dataApp7->setCreationDate(new \DateTime('2017-05-22 14:13:32'));
        $manager->persist($dataApp7);

        $dataApp8 = new DataApp();
        $dataApp8->setWall($walls[1]);
        $dataApp8->setCircleUser($circle_users[10]);
        $dataApp8->setCreationDate(new \DateTime('2017-05-22 16:34:51'));
        $manager->persist($dataApp8);

        $dataApp9 = new DataApp();
        $dataApp9->setWall($walls[2]);
        $dataApp9->setCircleUser($circle_users[11]);
        $dataApp9->setCreationDate(new \DateTime('2017-05-25 09:01:56'));
        $manager->persist($dataApp9);

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
