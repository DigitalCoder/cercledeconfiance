<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 18:03
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\ConnectedObject;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadConnectedObjectData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $datasObject = $manager->getRepository('AppBundle:DataObject')->findAll();
        $models = $manager->getRepository('AppBundle:Model')->findAll();

        $connectedObject0 = new ConnectedObject();
        $connectedObject0->setDataObject($datasObject[0]);
        $connectedObject0->setModel($models[0]);
        $manager->persist($connectedObject0);

        $connectedObject1 = new ConnectedObject();
        $connectedObject1->setDataObject($datasObject[1]);
        $connectedObject1->setModel($models[0]);
        $manager->persist($connectedObject1);

        $connectedObject2 = new ConnectedObject();
        $connectedObject2->setDataObject($datasObject[2]);
        $connectedObject2->setModel($models[1]);
        $manager->persist($connectedObject2);

        $connectedObject3 = new ConnectedObject();
        $connectedObject3->setDataObject($datasObject[3]);
        $connectedObject3->setModel($models[1]);
        $manager->persist($connectedObject3);

        $connectedObject4 = new ConnectedObject();
        $connectedObject4->setDataObject($datasObject[4]);
        $connectedObject4->setModel($models[2]);
        $manager->persist($connectedObject4);

        $connectedObject5 = new ConnectedObject();
        $connectedObject5->setDataObject($datasObject[5]);
        $connectedObject5->setModel($models[2]);
        $manager->persist($connectedObject5);

        $connectedObject6 = new ConnectedObject();
        $connectedObject6->setDataObject($datasObject[6]);
        $connectedObject6->setModel($models[3]);
       $manager->persist($connectedObject6);

        $connectedObject7 = new ConnectedObject();
        $connectedObject7->setDataObject($datasObject[7]);
        $connectedObject7->setModel($models[3]);
        $manager->persist($connectedObject7);

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
