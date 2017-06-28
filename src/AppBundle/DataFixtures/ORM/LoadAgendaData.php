<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 30/05/17
 * Time: 21:26
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Agenda;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAgendaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $categories_event = $manager->getRepository('AppBundle:CategoryEvent')->findAll();
        $circle = $manager->getRepository('AppBundle:Circle')->findAll();

        $agenda0 = new Agenda();
        $agenda0->setTitle('Urologue');
        $agenda0->setEventId('12345');
        $agenda0->setToken($circle[0]->getToken());
        $agenda0->setCategoryEvent($categories_event[0]);
        $agenda0->setDescription('Rendez-vous Dr Flaubert');
        $agenda0->setEventStart('2017-06-29 14:30:00');
        $agenda0->setEventEnd('2017-06-29 16:30:00');
        $manager->persist($agenda0);

        $agenda1 = new Agenda();
        $agenda1->setTitle('Petits enfants');
        $agenda1->setEventId('123456');
        $agenda1->setToken($circle[0]->getToken());
        $agenda1->setCategoryEvent($categories_event[1]);
        $agenda1->setDescription('Hansel et Gretel viennet manger !');
        $agenda1->setEventStart('2017-06-28 14:30:00');
        $agenda1->setEventEnd('2017-06-28 16:30:00');
        $manager->persist($agenda1);

        $agenda2 = new Agenda();
        $agenda2->setTitle('Cinema');
        $agenda2->setEventId('1234567');
        $agenda2->setToken($circle[0]->getToken());
        $agenda2->setCategoryEvent($categories_event[2]);
        $agenda2->setDescription('La grande vadrouille au grand rex');
        $agenda2->setEventStart('2017-06-27 14:30:00');
        $agenda2->setEventEnd('2017-06-27 16:30:00');
        $manager->persist($agenda2);

        $agenda3 = new Agenda();
        $agenda3->setTitle('Banque');
        $agenda3->setEventId('12345678');
        $agenda3->setToken($circle[0]->getToken());
        $agenda3->setCategoryEvent($categories_event[3]);
        $agenda3->setDescription('Avec M Pignon pour le découvert');
        $agenda3->setEventStart('2017-06-26 14:30:00');
        $agenda3->setEventEnd('2017-06-26 16:30:00');
        $manager->persist($agenda3);

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