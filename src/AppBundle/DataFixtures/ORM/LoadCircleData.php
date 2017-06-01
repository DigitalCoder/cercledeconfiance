<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 18:04
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Circle;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCircleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $offers = $manager->getRepository('AppBundle:Offer')->findAll();
        $addresses = $manager->getRepository('AppBundle:Address')->findAll();

        $circle0 = new Circle();
        $circle0->setAddress($addresses[5]);
        $circle0->setOffer($offers[1]);
        $circle0->setActive(1);
        $circle0->setPaid(1);
        $circle0->setName('Cercle_1');
        $manager->persist($circle0);

        $circle1 = new Circle();
        $circle1->setAddress($addresses[7]);
        $circle1->setOffer($offers[0]);
        $circle1->setActive(1);
        $circle1->setPaid(1);
        $circle1->setName('Cercle_2');
        $manager->persist($circle1);

        $circle2 = new Circle();
        $circle2->setAddress($addresses[9]);
        $circle2->setOffer($offers[1]);
        $circle2->setActive(1);
        $circle2->setPaid(1);
        $circle2->setName('Cercle_3');
        $manager->persist($circle2);

        $circle3 = new Circle();
        $circle3->setAddress($addresses[10]);
        $circle3->setOffer($offers[0]);
        $circle3->setActive(0);
        $circle3->setPaid(0);
        $circle3->setAvailabilityDate(new \DateTime());
        $circle3->setName('Cercle_4');
        $manager->persist($circle3);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }

}
