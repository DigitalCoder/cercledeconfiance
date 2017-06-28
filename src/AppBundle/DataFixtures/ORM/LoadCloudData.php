<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 16:23
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Cloud;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCloudData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $cloud0 = new Cloud();
        $cloud0->setFileName('image.png');
        $cloud0->setFileType('image/jpeg');
        $manager->persist($cloud0);

        $cloud1 = new Cloud();
        $cloud1->setFileName('video1.mp4');
        $cloud1->setFileType('video');
        $manager->persist($cloud1);

        $cloud2 = new Cloud();
        $cloud2->setFileName('doc1.pdf');
        $cloud2->setFileType('text/pdf');
        $manager->persist($cloud2);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}