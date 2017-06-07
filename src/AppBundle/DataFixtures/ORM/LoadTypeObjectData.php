<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 14:17
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Type_object;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTypeObjectData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $type_object0 = new Type_object();
        $type_object0->setType('Temperature sensor');
        $manager->persist($type_object0);

        $type_object1 = new Type_object();
        $type_object1->setType('Humidity sensor');
        $manager->persist($type_object1);

        $type_object2 = new Type_object();
        $type_object2->setType('Opening sensor');
        $manager->persist($type_object2);

        $type_object3 = new Type_object();
        $type_object3->setType('Smoke sensor');
        $manager->persist($type_object3);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 0;
    }
}