<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 16:42
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Object_entry;
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
        $circle_users = $manager->getRepository('AppBundle:Circle_user')->findAll();
        $types_object = $manager->getRepository('AppBundle:Type_object')->findAll();

        $object_entry0 = new Object_entry();
        $object_entry0->setCircleUser($circle_users[0]);
        $object_entry0->setTypeObject($types_object[0]);
        $object_entry0->setAccess(1);
        $manager->persist($object_entry0);

        $object_entry1 = new Object_entry();
        $object_entry1->setCircleUser($circle_users[0]);
        $object_entry1->setTypeObject($types_object[1]);
        $object_entry1->setAccess(1);
        $manager->persist($object_entry1);

        $object_entry2 = new Object_entry();
        $object_entry2->setCircleUser($circle_users[0]);
        $object_entry2->setTypeObject($types_object[2]);
        $object_entry2->setAccess(1);
        $manager->persist($object_entry2);

        $object_entry3 = new Object_entry();
        $object_entry3->setCircleUser($circle_users[0]);
        $object_entry3->setTypeObject($types_object[3]);
        $object_entry3->setAccess(1);
        $manager->persist($object_entry3);

        $object_entry4 = new Object_entry();
        $object_entry4->setCircleUser($circle_users[1]);
        $object_entry4->setTypeObject($types_object[0]);
        $object_entry4->setAccess(1);
        $manager->persist($object_entry4);

        $object_entry5 = new Object_entry();
        $object_entry5->setCircleUser($circle_users[1]);
        $object_entry5->setTypeObject($types_object[1]);
        $object_entry5->setAccess(1);
        $manager->persist($object_entry5);

        $object_entry6 = new Object_entry();
        $object_entry6->setCircleUser($circle_users[1]);
        $object_entry6->setTypeObject($types_object[2]);
        $object_entry6->setAccess(1);
        $manager->persist($object_entry6);

        $object_entry7 = new Object_entry();
        $object_entry7->setCircleUser($circle_users[1]);
        $object_entry7->setTypeObject($types_object[3]);
        $object_entry7->setAccess(1);
        $manager->persist($object_entry7);

        $object_entry8 = new Object_entry();
        $object_entry8->setCircleUser($circle_users[2]);
        $object_entry8->setTypeObject($types_object[0]);
        $object_entry8->setAccess(0);
        $manager->persist($object_entry8);

        $object_entry9 = new Object_entry();
        $object_entry9->setCircleUser($circle_users[2]);
        $object_entry9->setTypeObject($types_object[1]);
        $object_entry9->setAccess(1);
        $manager->persist($object_entry9);

        $object_entry10 = new Object_entry();
        $object_entry10->setCircleUser($circle_users[2]);
        $object_entry10->setTypeObject($types_object[2]);
        $object_entry10->setAccess(0);
        $manager->persist($object_entry10);

        $object_entry11 = new Object_entry();
        $object_entry11->setCircleUser($circle_users[2]);
        $object_entry11->setTypeObject($types_object[3]);
        $object_entry11->setAccess(1);
        $manager->persist($object_entry11);

        $object_entry12 = new Object_entry();
        $object_entry12->setCircleUser($circle_users[3]);
        $object_entry12->setTypeObject($types_object[0]);
        $object_entry12->setAccess(0);
        $manager->persist($object_entry12);

        $object_entry13 = new Object_entry();
        $object_entry13->setCircleUser($circle_users[3]);
        $object_entry13->setTypeObject($types_object[1]);
        $object_entry13->setAccess(1);
        $manager->persist($object_entry13);

        $object_entry14 = new Object_entry();
        $object_entry14->setCircleUser($circle_users[3]);
        $object_entry14->setTypeObject($types_object[2]);
        $object_entry14->setAccess(1);
        $manager->persist($object_entry14);

        $object_entry15 = new Object_entry();
        $object_entry15->setCircleUser($circle_users[3]);
        $object_entry15->setTypeObject($types_object[3]);
        $object_entry15->setAccess(1);
        $manager->persist($object_entry15);

        $object_entry16 = new Object_entry();
        $object_entry16->setCircleUser($circle_users[4]);
        $object_entry16->setTypeObject($types_object[0]);
        $object_entry16->setAccess(1);
        $manager->persist($object_entry16);

        $object_entry17 = new Object_entry();
        $object_entry17->setCircleUser($circle_users[4]);
        $object_entry17->setTypeObject($types_object[1]);
        $object_entry17->setAccess(1);
        $manager->persist($object_entry17);

        $object_entry18 = new Object_entry();
        $object_entry18->setCircleUser($circle_users[4]);
        $object_entry18->setTypeObject($types_object[2]);
        $object_entry18->setAccess(1);
        $manager->persist($object_entry18);

        $object_entry19 = new Object_entry();
        $object_entry19->setCircleUser($circle_users[4]);
        $object_entry19->setTypeObject($types_object[3]);
        $object_entry19->setAccess(0);
        $manager->persist($object_entry19);

        $object_entry20 = new Object_entry();
        $object_entry20->setCircleUser($circle_users[5]);
        $object_entry20->setTypeObject($types_object[0]);
        $object_entry20->setAccess(1);
        $manager->persist($object_entry20);

        $object_entry21 = new Object_entry();
        $object_entry21->setCircleUser($circle_users[5]);
        $object_entry21->setTypeObject($types_object[1]);
        $object_entry21->setAccess(1);
        $manager->persist($object_entry21);

        $object_entry22 = new Object_entry();
        $object_entry22->setCircleUser($circle_users[5]);
        $object_entry22->setTypeObject($types_object[2]);
        $object_entry22->setAccess(1);
        $manager->persist($object_entry22);

        $object_entry23 = new Object_entry();
        $object_entry23->setCircleUser($circle_users[5]);
        $object_entry23->setTypeObject($types_object[3]);
        $object_entry23->setAccess(1);
        $manager->persist($object_entry23);

        $object_entry24 = new Object_entry();
        $object_entry24->setCircleUser($circle_users[6]);
        $object_entry24->setTypeObject($types_object[0]);
        $object_entry24->setAccess(1);
        $manager->persist($object_entry24);

        $object_entry25 = new Object_entry();
        $object_entry25->setCircleUser($circle_users[6]);
        $object_entry25->setTypeObject($types_object[1]);
        $object_entry25->setAccess(1);
        $manager->persist($object_entry25);

        $object_entry26 = new Object_entry();
        $object_entry26->setCircleUser($circle_users[6]);
        $object_entry26->setTypeObject($types_object[2]);
        $object_entry26->setAccess(1);
        $manager->persist($object_entry26);

        $object_entry27 = new Object_entry();
        $object_entry27->setCircleUser($circle_users[6]);
        $object_entry27->setTypeObject($types_object[3]);
        $object_entry27->setAccess(1);
        $manager->persist($object_entry27);

        $object_entry28 = new Object_entry();
        $object_entry28->setCircleUser($circle_users[7]);
        $object_entry28->setTypeObject($types_object[0]);
        $object_entry28->setAccess(1);
        $manager->persist($object_entry28);

        $object_entry29 = new Object_entry();
        $object_entry29->setCircleUser($circle_users[7]);
        $object_entry29->setTypeObject($types_object[1]);
        $object_entry29->setAccess(1);
        $manager->persist($object_entry29);

        $object_entry30 = new Object_entry();
        $object_entry30->setCircleUser($circle_users[7]);
        $object_entry30->setTypeObject($types_object[2]);
        $object_entry30->setAccess(1);
        $manager->persist($object_entry30);

        $object_entry31 = new Object_entry();
        $object_entry31->setCircleUser($circle_users[7]);
        $object_entry31->setTypeObject($types_object[3]);
        $object_entry31->setAccess(1);
        $manager->persist($object_entry31);

        $object_entry32 = new Object_entry();
        $object_entry32->setCircleUser($circle_users[8]);
        $object_entry32->setTypeObject($types_object[0]);
        $object_entry32->setAccess(0);
        $manager->persist($object_entry32);

        $object_entry33 = new Object_entry();
        $object_entry33->setCircleUser($circle_users[8]);
        $object_entry33->setTypeObject($types_object[1]);
        $object_entry33->setAccess(0);
        $manager->persist($object_entry33);

        $object_entry34 = new Object_entry();
        $object_entry34->setCircleUser($circle_users[8]);
        $object_entry34->setTypeObject($types_object[2]);
        $object_entry34->setAccess(0);
        $manager->persist($object_entry34);

        $object_entry35 = new Object_entry();
        $object_entry35->setCircleUser($circle_users[8]);
        $object_entry35->setTypeObject($types_object[3]);
        $object_entry35->setAccess(0);
        $manager->persist($object_entry35);

        $object_entry36 = new Object_entry();
        $object_entry36->setCircleUser($circle_users[9]);
        $object_entry36->setTypeObject($types_object[0]);
        $object_entry36->setAccess(1);
        $manager->persist($object_entry36);

        $object_entry37 = new Object_entry();
        $object_entry37->setCircleUser($circle_users[9]);
        $object_entry37->setTypeObject($types_object[1]);
        $object_entry37->setAccess(1);
        $manager->persist($object_entry37);

        $object_entry38 = new Object_entry();
        $object_entry38->setCircleUser($circle_users[9]);
        $object_entry38->setTypeObject($types_object[2]);
        $object_entry38->setAccess(1);
        $manager->persist($object_entry38);

        $object_entry39 = new Object_entry();
        $object_entry39->setCircleUser($circle_users[9]);
        $object_entry39->setTypeObject($types_object[3]);
        $object_entry39->setAccess(1);
        $manager->persist($object_entry39);

        $object_entry40 = new Object_entry();
        $object_entry40->setCircleUser($circle_users[10]);
        $object_entry40->setTypeObject($types_object[0]);
        $object_entry40->setAccess(1);
        $manager->persist($object_entry40);

        $object_entry41 = new Object_entry();
        $object_entry41->setCircleUser($circle_users[10]);
        $object_entry41->setTypeObject($types_object[1]);
        $object_entry41->setAccess(0);
        $manager->persist($object_entry41);

        $object_entry42 = new Object_entry();
        $object_entry42->setCircleUser($circle_users[10]);
        $object_entry42->setTypeObject($types_object[2]);
        $object_entry42->setAccess(1);
        $manager->persist($object_entry42);

        $object_entry43 = new Object_entry();
        $object_entry43->setCircleUser($circle_users[10]);
        $object_entry43->setTypeObject($types_object[3]);
        $object_entry43->setAccess(0);
        $manager->persist($object_entry43);

        $object_entry44 = new Object_entry();
        $object_entry44->setCircleUser($circle_users[11]);
        $object_entry44->setTypeObject($types_object[0]);
        $object_entry44->setAccess(1);
        $manager->persist($object_entry44);

        $object_entry45 = new Object_entry();
        $object_entry45->setCircleUser($circle_users[11]);
        $object_entry45->setTypeObject($types_object[1]);
        $object_entry45->setAccess(1);
        $manager->persist($object_entry45);

        $object_entry46 = new Object_entry();
        $object_entry46->setCircleUser($circle_users[11]);
        $object_entry46->setTypeObject($types_object[2]);
        $object_entry46->setAccess(1);
        $manager->persist($object_entry46);

        $object_entry47 = new Object_entry();
        $object_entry47->setCircleUser($circle_users[11]);
        $object_entry47->setTypeObject($types_object[3]);
        $object_entry47->setAccess(1);
        $manager->persist($object_entry47);

        $object_entry48 = new Object_entry();
        $object_entry48->setCircleUser($circle_users[12]);
        $object_entry48->setTypeObject($types_object[0]);
        $object_entry48->setAccess(1);
        $manager->persist($object_entry48);

        $object_entry49 = new Object_entry();
        $object_entry49->setCircleUser($circle_users[12]);
        $object_entry49->setTypeObject($types_object[1]);
        $object_entry49->setAccess(1);
        $manager->persist($object_entry49);

        $object_entry50 = new Object_entry();
        $object_entry50->setCircleUser($circle_users[12]);
        $object_entry50->setTypeObject($types_object[2]);
        $object_entry50->setAccess(1);
        $manager->persist($object_entry50);

        $object_entry51 = new Object_entry();
        $object_entry51->setCircleUser($circle_users[12]);
        $object_entry51->setTypeObject($types_object[3]);
        $object_entry51->setAccess(1);
        $manager->persist($object_entry51);

        $object_entry52 = new Object_entry();
        $object_entry52->setCircleUser($circle_users[13]);
        $object_entry52->setTypeObject($types_object[0]);
        $object_entry52->setAccess(0);
        $manager->persist($object_entry52);

        $object_entry53 = new Object_entry();
        $object_entry53->setCircleUser($circle_users[13]);
        $object_entry53->setTypeObject($types_object[1]);
        $object_entry53->setAccess(0);
        $manager->persist($object_entry53);

        $object_entry54 = new Object_entry();
        $object_entry54->setCircleUser($circle_users[13]);
        $object_entry54->setTypeObject($types_object[2]);
        $object_entry54->setAccess(1);
        $manager->persist($object_entry54);

        $object_entry55 = new Object_entry();
        $object_entry55->setCircleUser($circle_users[13]);
        $object_entry55->setTypeObject($types_object[3]);
        $object_entry55->setAccess(0);
        $manager->persist($object_entry55);

        $object_entry56 = new Object_entry();
        $object_entry56->setCircleUser($circle_users[14]);
        $object_entry56->setTypeObject($types_object[0]);
        $object_entry56->setAccess(1);
        $manager->persist($object_entry56);

        $object_entry57 = new Object_entry();
        $object_entry57->setCircleUser($circle_users[14]);
        $object_entry57->setTypeObject($types_object[1]);
        $object_entry57->setAccess(1);
        $manager->persist($object_entry57);

        $object_entry58 = new Object_entry();
        $object_entry58->setCircleUser($circle_users[14]);
        $object_entry58->setTypeObject($types_object[2]);
        $object_entry58->setAccess(1);
        $manager->persist($object_entry58);

        $object_entry59 = new Object_entry();
        $object_entry59->setCircleUser($circle_users[14]);
        $object_entry59->setTypeObject($types_object[3]);
        $object_entry59->setAccess(1);
        $manager->persist($object_entry59);

        $object_entry60 = new Object_entry();
        $object_entry60->setCircleUser($circle_users[15]);
        $object_entry60->setTypeObject($types_object[0]);
        $object_entry60->setAccess(1);
        $manager->persist($object_entry60);

        $object_entry61 = new Object_entry();
        $object_entry61->setCircleUser($circle_users[15]);
        $object_entry61->setTypeObject($types_object[1]);
        $object_entry61->setAccess(1);
        $manager->persist($object_entry61);

        $object_entry62 = new Object_entry();
        $object_entry62->setCircleUser($circle_users[15]);
        $object_entry62->setTypeObject($types_object[2]);
        $object_entry62->setAccess(1);
        $manager->persist($object_entry62);

        $object_entry63 = new Object_entry();
        $object_entry63->setCircleUser($circle_users[15]);
        $object_entry63->setTypeObject($types_object[3]);
        $object_entry63->setAccess(1);
        $manager->persist($object_entry63);

        $object_entry64 = new Object_entry();
        $object_entry64->setCircleUser($circle_users[16]);
        $object_entry64->setTypeObject($types_object[0]);
        $object_entry64->setAccess(1);
        $manager->persist($object_entry64);

        $object_entry65 = new Object_entry();
        $object_entry65->setCircleUser($circle_users[16]);
        $object_entry65->setTypeObject($types_object[1]);
        $object_entry65->setAccess(1);
        $manager->persist($object_entry65);

        $object_entry66 = new Object_entry();
        $object_entry66->setCircleUser($circle_users[16]);
        $object_entry66->setTypeObject($types_object[2]);
        $object_entry66->setAccess(1);
        $manager->persist($object_entry66);

        $object_entry67 = new Object_entry();
        $object_entry67->setCircleUser($circle_users[16]);
        $object_entry67->setTypeObject($types_object[3]);
        $object_entry67->setAccess(1);
        $manager->persist($object_entry67);

        $object_entry68 = new Object_entry();
        $object_entry68->setCircleUser($circle_users[17]);
        $object_entry68->setTypeObject($types_object[0]);
        $object_entry68->setAccess(0);
        $manager->persist($object_entry68);

        $object_entry69 = new Object_entry();
        $object_entry69->setCircleUser($circle_users[17]);
        $object_entry69->setTypeObject($types_object[1]);
        $object_entry69->setAccess(0);
        $manager->persist($object_entry69);

        $object_entry70 = new Object_entry();
        $object_entry70->setCircleUser($circle_users[17]);
        $object_entry70->setTypeObject($types_object[2]);
        $object_entry70->setAccess(0);
        $manager->persist($object_entry70);

        $object_entry71 = new Object_entry();
        $object_entry71->setCircleUser($circle_users[17]);
        $object_entry71->setTypeObject($types_object[3]);
        $object_entry71->setAccess(0);
        $manager->persist($object_entry71);

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
