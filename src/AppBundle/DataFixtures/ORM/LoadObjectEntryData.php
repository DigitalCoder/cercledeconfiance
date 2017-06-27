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
//
//        $objectEntry24 = new ObjectEntry();
//        $objectEntry24->setCircleUser($circle_users[6]);
//        $objectEntry24->setModel($models[0]);
//        $objectEntry24->setAccess(1);
//        $manager->persist($objectEntry24);
//
//        $objectEntry25 = new ObjectEntry();
//        $objectEntry25->setCircleUser($circle_users[6]);
//        $objectEntry25->setModel($models[1]);
//        $objectEntry25->setAccess(1);
//        $manager->persist($objectEntry25);
//
//        $objectEntry26 = new ObjectEntry();
//        $objectEntry26->setCircleUser($circle_users[6]);
//        $objectEntry26->setModel($models[2]);
//        $objectEntry26->setAccess(1);
//        $manager->persist($objectEntry26);
//
//        $objectEntry27 = new ObjectEntry();
//        $objectEntry27->setCircleUser($circle_users[6]);
//        $objectEntry27->setModel($models[3]);
//        $objectEntry27->setAccess(1);
//        $manager->persist($objectEntry27);
//
//        $objectEntry28 = new ObjectEntry();
//        $objectEntry28->setCircleUser($circle_users[7]);
//        $objectEntry28->setModel($models[0]);
//        $objectEntry28->setAccess(1);
//        $manager->persist($objectEntry28);
//
//        $objectEntry29 = new ObjectEntry();
//        $objectEntry29->setCircleUser($circle_users[7]);
//        $objectEntry29->setModel($models[1]);
//        $objectEntry29->setAccess(1);
//        $manager->persist($objectEntry29);
//
//        $objectEntry30 = new ObjectEntry();
//        $objectEntry30->setCircleUser($circle_users[7]);
//        $objectEntry30->setModel($models[2]);
//        $objectEntry30->setAccess(1);
//        $manager->persist($objectEntry30);
//
//        $objectEntry31 = new ObjectEntry();
//        $objectEntry31->setCircleUser($circle_users[7]);
//        $objectEntry31->setModel($models[3]);
//        $objectEntry31->setAccess(1);
//        $manager->persist($objectEntry31);
//
//        $objectEntry32 = new ObjectEntry();
//        $objectEntry32->setCircleUser($circle_users[8]);
//        $objectEntry32->setModel($models[0]);
//        $objectEntry32->setAccess(0);
//        $manager->persist($objectEntry32);
//
//        $objectEntry33 = new ObjectEntry();
//        $objectEntry33->setCircleUser($circle_users[8]);
//        $objectEntry33->setModel($models[1]);
//        $objectEntry33->setAccess(0);
//        $manager->persist($objectEntry33);
//
//        $objectEntry34 = new ObjectEntry();
//        $objectEntry34->setCircleUser($circle_users[8]);
//        $objectEntry34->setModel($models[2]);
//        $objectEntry34->setAccess(0);
//        $manager->persist($objectEntry34);
//
//        $objectEntry35 = new ObjectEntry();
//        $objectEntry35->setCircleUser($circle_users[8]);
//        $objectEntry35->setModel($models[3]);
//        $objectEntry35->setAccess(0);
//        $manager->persist($objectEntry35);
//
//        $objectEntry36 = new ObjectEntry();
//        $objectEntry36->setCircleUser($circle_users[9]);
//        $objectEntry36->setModel($models[0]);
//        $objectEntry36->setAccess(1);
//        $manager->persist($objectEntry36);
//
//        $objectEntry37 = new ObjectEntry();
//        $objectEntry37->setCircleUser($circle_users[9]);
//        $objectEntry37->setModel($models[1]);
//        $objectEntry37->setAccess(1);
//        $manager->persist($objectEntry37);
//
//        $objectEntry38 = new ObjectEntry();
//        $objectEntry38->setCircleUser($circle_users[9]);
//        $objectEntry38->setModel($models[2]);
//        $objectEntry38->setAccess(1);
//        $manager->persist($objectEntry38);
//
//        $objectEntry39 = new ObjectEntry();
//        $objectEntry39->setCircleUser($circle_users[9]);
//        $objectEntry39->setModel($models[3]);
//        $objectEntry39->setAccess(1);
//        $manager->persist($objectEntry39);
//
//        $objectEntry40 = new ObjectEntry();
//        $objectEntry40->setCircleUser($circle_users[10]);
//        $objectEntry40->setModel($models[0]);
//        $objectEntry40->setAccess(1);
//        $manager->persist($objectEntry40);
//
//        $objectEntry41 = new ObjectEntry();
//        $objectEntry41->setCircleUser($circle_users[10]);
//        $objectEntry41->setModel($models[1]);
//        $objectEntry41->setAccess(0);
//        $manager->persist($objectEntry41);
//
//        $objectEntry42 = new ObjectEntry();
//        $objectEntry42->setCircleUser($circle_users[10]);
//        $objectEntry42->setModel($models[2]);
//        $objectEntry42->setAccess(1);
//        $manager->persist($objectEntry42);
//
//        $objectEntry43 = new ObjectEntry();
//        $objectEntry43->setCircleUser($circle_users[10]);
//        $objectEntry43->setModel($models[3]);
//        $objectEntry43->setAccess(0);
//        $manager->persist($objectEntry43);
//
//        $objectEntry44 = new ObjectEntry();
//        $objectEntry44->setCircleUser($circle_users[11]);
//        $objectEntry44->setModel($models[0]);
//        $objectEntry44->setAccess(1);
//        $manager->persist($objectEntry44);
//
//        $objectEntry45 = new ObjectEntry();
//        $objectEntry45->setCircleUser($circle_users[11]);
//        $objectEntry45->setModel($models[1]);
//        $objectEntry45->setAccess(1);
//        $manager->persist($objectEntry45);
//
//        $objectEntry46 = new ObjectEntry();
//        $objectEntry46->setCircleUser($circle_users[11]);
//        $objectEntry46->setModel($models[2]);
//        $objectEntry46->setAccess(1);
//        $manager->persist($objectEntry46);
//
//        $objectEntry47 = new ObjectEntry();
//        $objectEntry47->setCircleUser($circle_users[11]);
//        $objectEntry47->setModel($models[3]);
//        $objectEntry47->setAccess(1);
//        $manager->persist($objectEntry47);
//
//        $objectEntry48 = new ObjectEntry();
//        $objectEntry48->setCircleUser($circle_users[12]);
//        $objectEntry48->setModel($models[0]);
//        $objectEntry48->setAccess(1);
//        $manager->persist($objectEntry48);
//
//        $objectEntry49 = new ObjectEntry();
//        $objectEntry49->setCircleUser($circle_users[12]);
//        $objectEntry49->setModel($models[1]);
//        $objectEntry49->setAccess(1);
//        $manager->persist($objectEntry49);
//
//        $objectEntry50 = new ObjectEntry();
//        $objectEntry50->setCircleUser($circle_users[12]);
//        $objectEntry50->setModel($models[2]);
//        $objectEntry50->setAccess(1);
//        $manager->persist($objectEntry50);
//
//        $objectEntry51 = new ObjectEntry();
//        $objectEntry51->setCircleUser($circle_users[12]);
//        $objectEntry51->setModel($models[3]);
//        $objectEntry51->setAccess(1);
//        $manager->persist($objectEntry51);
//
//        $objectEntry52 = new ObjectEntry();
//        $objectEntry52->setCircleUser($circle_users[13]);
//        $objectEntry52->setModel($models[0]);
//        $objectEntry52->setAccess(0);
//        $manager->persist($objectEntry52);
//
//        $objectEntry53 = new ObjectEntry();
//        $objectEntry53->setCircleUser($circle_users[13]);
//        $objectEntry53->setModel($models[1]);
//        $objectEntry53->setAccess(0);
//        $manager->persist($objectEntry53);
//
//        $objectEntry54 = new ObjectEntry();
//        $objectEntry54->setCircleUser($circle_users[13]);
//        $objectEntry54->setModel($models[2]);
//        $objectEntry54->setAccess(1);
//        $manager->persist($objectEntry54);
//
//        $objectEntry55 = new ObjectEntry();
//        $objectEntry55->setCircleUser($circle_users[13]);
//        $objectEntry55->setModel($models[3]);
//        $objectEntry55->setAccess(0);
//        $manager->persist($objectEntry55);
//
//        $objectEntry56 = new ObjectEntry();
//        $objectEntry56->setCircleUser($circle_users[14]);
//        $objectEntry56->setModel($models[0]);
//        $objectEntry56->setAccess(1);
//        $manager->persist($objectEntry56);
//
//        $objectEntry57 = new ObjectEntry();
//        $objectEntry57->setCircleUser($circle_users[14]);
//        $objectEntry57->setModel($models[1]);
//        $objectEntry57->setAccess(1);
//        $manager->persist($objectEntry57);
//
//        $objectEntry58 = new ObjectEntry();
//        $objectEntry58->setCircleUser($circle_users[14]);
//        $objectEntry58->setModel($models[2]);
//        $objectEntry58->setAccess(1);
//        $manager->persist($objectEntry58);
//
//        $objectEntry59 = new ObjectEntry();
//        $objectEntry59->setCircleUser($circle_users[14]);
//        $objectEntry59->setModel($models[3]);
//        $objectEntry59->setAccess(1);
//        $manager->persist($objectEntry59);
//
//        $objectEntry60 = new ObjectEntry();
//        $objectEntry60->setCircleUser($circle_users[15]);
//        $objectEntry60->setModel($models[0]);
//        $objectEntry60->setAccess(1);
//        $manager->persist($objectEntry60);
//
//        $objectEntry61 = new ObjectEntry();
//        $objectEntry61->setCircleUser($circle_users[15]);
//        $objectEntry61->setModel($models[1]);
//        $objectEntry61->setAccess(1);
//        $manager->persist($objectEntry61);
//
//        $objectEntry62 = new ObjectEntry();
//        $objectEntry62->setCircleUser($circle_users[15]);
//        $objectEntry62->setModel($models[2]);
//        $objectEntry62->setAccess(1);
//        $manager->persist($objectEntry62);
//
//        $objectEntry63 = new ObjectEntry();
//        $objectEntry63->setCircleUser($circle_users[15]);
//        $objectEntry63->setModel($models[3]);
//        $objectEntry63->setAccess(1);
//        $manager->persist($objectEntry63);
//
//        $objectEntry64 = new ObjectEntry();
//        $objectEntry64->setCircleUser($circle_users[16]);
//        $objectEntry64->setModel($models[0]);
//        $objectEntry64->setAccess(1);
//        $manager->persist($objectEntry64);
//
//        $objectEntry65 = new ObjectEntry();
//        $objectEntry65->setCircleUser($circle_users[16]);
//        $objectEntry65->setModel($models[1]);
//        $objectEntry65->setAccess(1);
//        $manager->persist($objectEntry65);
//
//        $objectEntry66 = new ObjectEntry();
//        $objectEntry66->setCircleUser($circle_users[16]);
//        $objectEntry66->setModel($models[2]);
//        $objectEntry66->setAccess(1);
//        $manager->persist($objectEntry66);
//
//        $objectEntry67 = new ObjectEntry();
//        $objectEntry67->setCircleUser($circle_users[16]);
//        $objectEntry67->setModel($models[3]);
//        $objectEntry67->setAccess(1);
//        $manager->persist($objectEntry67);
//
//        $objectEntry68 = new ObjectEntry();
//        $objectEntry68->setCircleUser($circle_users[17]);
//        $objectEntry68->setModel($models[0]);
//        $objectEntry68->setAccess(0);
//        $manager->persist($objectEntry68);
//
//        $objectEntry69 = new ObjectEntry();
//        $objectEntry69->setCircleUser($circle_users[17]);
//        $objectEntry69->setModel($models[1]);
//        $objectEntry69->setAccess(0);
//        $manager->persist($objectEntry69);
//
//        $objectEntry70 = new ObjectEntry();
//        $objectEntry70->setCircleUser($circle_users[17]);
//        $objectEntry70->setModel($models[2]);
//        $objectEntry70->setAccess(0);
//        $manager->persist($objectEntry70);
//
//        $objectEntry71 = new ObjectEntry();
//        $objectEntry71->setCircleUser($circle_users[17]);
//        $objectEntry71->setModel($models[3]);
//        $objectEntry71->setAccess(0);
//        $manager->persist($objectEntry71);

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
