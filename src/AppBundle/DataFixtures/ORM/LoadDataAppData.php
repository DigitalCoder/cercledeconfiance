<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 18:01
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Data_app;
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
        $circle_users = $manager->getRepository('AppBundle:Circle_user')->findAll();

        $data_app0 = new Data_app();
        $data_app0->setCloud($clouds[0]);
        $data_app0->setCircleUser($circle_users[3]);
        $data_app0->setCreationDate(new \DateTime('2017-05-29 18:37:52'));
        $manager->persist($data_app0);

        $data_app1 = new Data_app();
        $data_app1->setCloud($clouds[1]);
        $data_app1->setCircleUser($circle_users[9]);
        $data_app1->setCreationDate(new \DateTime('2017-05-27 20:07:22'));
        $manager->persist($data_app1);

        $data_app2 = new Data_app();
        $data_app2->setCloud($clouds[2]);
        $data_app2->setCircleUser($circle_users[11]);
        $data_app2->setCreationDate(new \DateTime('2017-05-20 11:32:24'));
        $manager->persist($data_app2);

        $data_app3 = new Data_app();
        $data_app3->setAgenda($agendas[0]);
        $data_app3->setCircleUser($circle_users[0]);
        $data_app3->setCreationDate(new \DateTime('2017-06-09 16:07:12'));
        $manager->persist($data_app3);

        $data_app4 = new Data_app();
        $data_app4->setAgenda($agendas[1]);
        $data_app4->setCircleUser($circle_users[6]);
        $data_app4->setCreationDate(new \DateTime('2017-04-29 17:12:52'));
        $manager->persist($data_app4);

        $data_app5 = new Data_app();
        $data_app5->setAgenda($agendas[2]);
        $data_app5->setCircleUser($circle_users[12]);
        $data_app5->setCreationDate(new \DateTime('2017-05-29 06:33:46'));
        $manager->persist($data_app5);

        $data_app6 = new Data_app();
        $data_app6->setAgenda($agendas[3]);
        $data_app6->setCircleUser($circle_users[1]);
        $data_app6->setCreationDate(new \DateTime('2017-05-28 16:07:12'));
        $manager->persist($data_app6);

        $data_app7 = new Data_app();
        $data_app7->setWall($walls[0]);
        $data_app7->setCircleUser($circle_users[5]);
        $data_app7->setCreationDate(new \DateTime('2017-05-22 14:13:32'));
        $manager->persist($data_app7);

        $data_app8 = new Data_app();
        $data_app8->setWall($walls[1]);
        $data_app8->setCircleUser($circle_users[10]);
        $data_app8->setCreationDate(new \DateTime('2017-05-22 16:34:51'));
        $manager->persist($data_app8);

        $data_app9 = new Data_app();
        $data_app9->setWall($walls[2]);
        $data_app9->setCircleUser($circle_users[11]);
        $data_app9->setCreationDate(new \DateTime('2017-05-25 09:01:56'));
        $manager->persist($data_app9);

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
