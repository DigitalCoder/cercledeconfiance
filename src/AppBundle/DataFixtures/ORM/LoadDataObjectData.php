<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 14:31
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Data_object;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDataObjectData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $data_object0 = new Data_object();
        $data_object0->setData(21.7);
        $manager->persist($data_object0);

        $data_object1 = new Data_object();
        $data_object1->setData(24.1);
        $manager->persist($data_object1);

        $data_object2 = new Data_object();
        $data_object2->setData(87);
        $manager->persist($data_object2);

        $data_object3 = new Data_object();
        $data_object3->setData(72);
        $manager->persist($data_object3);

        $data_object4 = new Data_object();
        $data_object4->setData(1);
        $manager->persist($data_object4);

        $data_object5 = new Data_object();
        $data_object5->setData(0);
        $manager->persist($data_object5);

        $data_object6 = new Data_object();
        $data_object6->setData(1);
        $manager->persist($data_object6);

        $data_object7 = new Data_object();
        $data_object7->setData(0);
        $manager->persist($data_object7);

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