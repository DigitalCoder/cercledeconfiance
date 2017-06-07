<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 14:56
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\File_type;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFileTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $file_type0 = new File_type();
        $file_type0->setName('image');
        $manager->persist($file_type0);

        $file_type1 = new File_type();
        $file_type1->setName('video');
        $manager->persist($file_type1);

        $file_type2 = new File_type();
        $file_type2->setName('document');
        $manager->persist($file_type2);

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