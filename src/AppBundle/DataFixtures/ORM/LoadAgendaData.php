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

        $agenda0 = new Agenda();
        $agenda0->setName('Urologue');
        $agenda0->setCategoryEvent($categories_event[0]);
        $agenda0->setEvent('Rendez-vous Dr Flaubert');
        $agenda0->setEventStart(new \DateTime('2017-05-29 14:30'));
        $agenda0->setEventEnd(new \DateTime('2017-05-29 16:30'));
        $manager->persist($agenda0);

        $agenda1 = new Agenda();
        $agenda1->setName('Petits enfants');
        $agenda1->setCategoryEvent($categories_event[1]);
        $agenda1->setEvent('Hansel et Gretel viennet manger !');
        $agenda1->setEventStart(new \DateTime('2017-06-12 12:00'));
        $agenda1->setEventEnd(new \DateTime('2017-06-12 16:00'));
        $manager->persist($agenda1);

        $agenda2 = new Agenda();
        $agenda2->setName('Cinema');
        $agenda2->setCategoryEvent($categories_event[2]);
        $agenda2->setEvent('La grande vadrouille au grand rex');
        $agenda2->setEventStart(new \DateTime('2017-05-27 11:15'));
        $agenda2->setEventEnd(new \DateTime('2017-05-27 12:50'));
        $manager->persist($agenda2);

        $agenda3 = new Agenda();
        $agenda3->setName('Banque');
        $agenda3->setCategoryEvent($categories_event[3]);
        $agenda3->setEvent('Avec M Pignon pour le découvert');
        $agenda3->setEventStart(new \DateTime('2017-06-17 15:30'));
        $agenda3->setEventEnd(new \DateTime('2017-06-17 16:30'));
        $manager->persist($agenda3);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}