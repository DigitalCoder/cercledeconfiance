<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 16:42
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\ObjectEntry;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadObjectEntryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $circle_users = $manager->getRepository('AppBundle:CircleUser')->findAll();
        $models = $manager->getRepository('AppBundle:Model')->findAll();

        $objectEntry0 = new ObjectEntry();
        $objectEntry0->setCircleUser($circle_users[0]);
        $objectEntry0->setModel($models[0]);
        $objectEntry0->setAccess(1);
        $manager->persist($objectEntry0);

        $objectEntry1 = new ObjectEntry();
        $objectEntry1->setCircleUser($circle_users[0]);
        $objectEntry1->setModel($models[1]);
        $objectEntry1->setAccess(1);
        $manager->persist($objectEntry1);

        $objectEntry2 = new ObjectEntry();
        $objectEntry2->setCircleUser($circle_users[0]);
        $objectEntry2->setModel($models[2]);
        $objectEntry2->setAccess(1);
        $manager->persist($objectEntry2);

        $objectEntry3 = new ObjectEntry();
        $objectEntry3->setCircleUser($circle_users[0]);
        $objectEntry3->setModel($models[3]);
        $objectEntry3->setAccess(1);
        $manager->persist($objectEntry3);

        $objectEntry4 = new ObjectEntry();
        $objectEntry4->setCircleUser($circle_users[1]);
        $objectEntry4->setModel($models[0]);
        $objectEntry4->setAccess(1);
        $manager->persist($objectEntry4);

        $objectEntry5 = new ObjectEntry();
        $objectEntry5->setCircleUser($circle_users[1]);
        $objectEntry5->setModel($models[1]);
        $objectEntry5->setAccess(1);
        $manager->persist($objectEntry5);

        $objectEntry6 = new ObjectEntry();
        $objectEntry6->setCircleUser($circle_users[1]);
        $objectEntry6->setModel($models[2]);
        $objectEntry6->setAccess(1);
        $manager->persist($objectEntry6);

        $objectEntry7 = new ObjectEntry();
        $objectEntry7->setCircleUser($circle_users[1]);
        $objectEntry7->setModel($models[3]);
        $objectEntry7->setAccess(1);
        $manager->persist($objectEntry7);

        $objectEntry8 = new ObjectEntry();
        $objectEntry8->setCircleUser($circle_users[2]);
        $objectEntry8->setModel($models[0]);
        $objectEntry8->setAccess(0);
        $manager->persist($objectEntry8);

        $objectEntry9 = new ObjectEntry();
        $objectEntry9->setCircleUser($circle_users[2]);
        $objectEntry9->setModel($models[1]);
        $objectEntry9->setAccess(1);
        $manager->persist($objectEntry9);

        $objectEntry10 = new ObjectEntry();
        $objectEntry10->setCircleUser($circle_users[2]);
        $objectEntry10->setModel($models[2]);
        $objectEntry10->setAccess(0);
        $manager->persist($objectEntry10);

        $objectEntry11 = new ObjectEntry();
        $objectEntry11->setCircleUser($circle_users[2]);
        $objectEntry11->setModel($models[3]);
        $objectEntry11->setAccess(1);
        $manager->persist($objectEntry11);

        $objectEntry12 = new ObjectEntry();
        $objectEntry12->setCircleUser($circle_users[3]);
        $objectEntry12->setModel($models[0]);
        $objectEntry12->setAccess(0);
        $manager->persist($objectEntry12);

        $objectEntry13 = new ObjectEntry();
        $objectEntry13->setCircleUser($circle_users[3]);
        $objectEntry13->setModel($models[1]);
        $objectEntry13->setAccess(1);
        $manager->persist($objectEntry13);

        $objectEntry14 = new ObjectEntry();
        $objectEntry14->setCircleUser($circle_users[3]);
        $objectEntry14->setModel($models[2]);
        $objectEntry14->setAccess(1);
        $manager->persist($objectEntry14);

        $objectEntry15 = new ObjectEntry();
        $objectEntry15->setCircleUser($circle_users[3]);
        $objectEntry15->setModel($models[3]);
        $objectEntry15->setAccess(1);
        $manager->persist($objectEntry15);

        $objectEntry16 = new ObjectEntry();
        $objectEntry16->setCircleUser($circle_users[4]);
        $objectEntry16->setModel($models[0]);
        $objectEntry16->setAccess(1);
        $manager->persist($objectEntry16);

        $objectEntry17 = new ObjectEntry();
        $objectEntry17->setCircleUser($circle_users[4]);
        $objectEntry17->setModel($models[1]);
        $objectEntry17->setAccess(1);
        $manager->persist($objectEntry17);

        $objectEntry18 = new ObjectEntry();
        $objectEntry18->setCircleUser($circle_users[4]);
        $objectEntry18->setModel($models[2]);
        $objectEntry18->setAccess(1);
        $manager->persist($objectEntry18);

        $objectEntry19 = new ObjectEntry();
        $objectEntry19->setCircleUser($circle_users[4]);
        $objectEntry19->setModel($models[3]);
        $objectEntry19->setAccess(0);
        $manager->persist($objectEntry19);

        $objectEntry20 = new ObjectEntry();
        $objectEntry20->setCircleUser($circle_users[5]);
        $objectEntry20->setModel($models[0]);
        $objectEntry20->setAccess(1);
        $manager->persist($objectEntry20);

        $objectEntry21 = new ObjectEntry();
        $objectEntry21->setCircleUser($circle_users[5]);
        $objectEntry21->setModel($models[1]);
        $objectEntry21->setAccess(1);
        $manager->persist($objectEntry21);

        $objectEntry22 = new ObjectEntry();
        $objectEntry22->setCircleUser($circle_users[5]);
        $objectEntry22->setModel($models[2]);
        $objectEntry22->setAccess(1);
        $manager->persist($objectEntry22);

        $objectEntry23 = new ObjectEntry();
        $objectEntry23->setCircleUser($circle_users[5]);
        $objectEntry23->setModel($models[3]);
        $objectEntry23->setAccess(1);
        $manager->persist($objectEntry23);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 5;
    }

}
