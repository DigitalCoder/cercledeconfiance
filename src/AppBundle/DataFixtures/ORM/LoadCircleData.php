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
        $circle0->setAddress($addresses[0]);
        $circle0->setOffer($offers[0]);
        $circle0->setActive(1);
        $circle0->setPaid(1);
        $circle0->setName('Cercle1');
        $manager->persist($circle0);

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
