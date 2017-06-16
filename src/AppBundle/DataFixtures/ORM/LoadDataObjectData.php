<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 14:31
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\DataObject;
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
        $dataObject0 = new DataObject();
        $dataObject0->setData(21.7);
        $manager->persist($dataObject0);

        $dataObject1 = new DataObject();
        $dataObject1->setData(24.1);
        $manager->persist($dataObject1);

        $dataObject2 = new DataObject();
        $dataObject2->setData(87);
        $manager->persist($dataObject2);

        $dataObject3 = new DataObject();
        $dataObject3->setData(72);
        $manager->persist($dataObject3);

        $dataObject4 = new DataObject();
        $dataObject4->setData(1);
        $manager->persist($dataObject4);

        $dataObject5 = new DataObject();
        $dataObject5->setData(0);
        $manager->persist($dataObject5);

        $dataObject6 = new DataObject();
        $dataObject6->setData(1);
        $manager->persist($dataObject6);

        $dataObject7 = new DataObject();
        $dataObject7->setData(0);
        $manager->persist($dataObject7);

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