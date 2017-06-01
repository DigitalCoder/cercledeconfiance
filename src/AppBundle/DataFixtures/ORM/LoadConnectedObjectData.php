<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 18:03
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Connected_object;
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
        $datas_object = $manager->getRepository('AppBundle:Data_object')->findAll();
        $models = $manager->getRepository('AppBundle:Model')->findAll();
        $type_objects = $manager->getRepository('AppBundle:Type_object')->findAll();

        $connected_object0 = new Connected_object();
        $connected_object0->setDataObject($datas_object[0]);
        $connected_object0->setModel($models[0]);
        $connected_object0->setTypeObject($type_objects[0]);
        $manager->persist($connected_object0);

        $connected_object1 = new Connected_object();
        $connected_object1->setDataObject($datas_object[1]);
        $connected_object1->setModel($models[0]);
        $connected_object0->setTypeObject($type_objects[0]);
        $manager->persist($connected_object1);

        $connected_object2 = new Connected_object();
        $connected_object2->setDataObject($datas_object[2]);
        $connected_object2->setModel($models[1]);
        $connected_object0->setTypeObject($type_objects[1]);
        $manager->persist($connected_object2);

        $connected_object3 = new Connected_object();
        $connected_object3->setDataObject($datas_object[3]);
        $connected_object3->setModel($models[1]);
        $connected_object0->setTypeObject($type_objects[1]);
        $manager->persist($connected_object3);

        $connected_object4 = new Connected_object();
        $connected_object4->setDataObject($datas_object[4]);
        $connected_object4->setModel($models[2]);
        $connected_object0->setTypeObject($type_objects[2]);
        $manager->persist($connected_object4);

        $connected_object5 = new Connected_object();
        $connected_object5->setDataObject($datas_object[5]);
        $connected_object5->setModel($models[2]);
        $connected_object0->setTypeObject($type_objects[2]);
        $manager->persist($connected_object5);

        $connected_object6 = new Connected_object();
        $connected_object6->setDataObject($datas_object[6]);
        $connected_object6->setModel($models[3]);
        $connected_object0->setTypeObject($type_objects[3]);
        $manager->persist($connected_object6);

        $connected_object7 = new Connected_object();
        $connected_object7->setDataObject($datas_object[7]);
        $connected_object7->setModel($models[3]);
        $connected_object0->setTypeObject($type_objects[3]);
        $manager->persist($connected_object7);

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
