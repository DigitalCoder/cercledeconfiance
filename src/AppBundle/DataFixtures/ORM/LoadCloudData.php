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
        $file_types = $manager->getRepository('AppBundle:File_type')->findAll();
        
        $cloud0 = new Cloud();
        $cloud0->setFileName('photo1');
        $cloud0->setUrl('http://static1.terrafemina.com/articles/7/11/61/07/@/110317-les-jeux-video-sont-bons-pour-la-sante-des-personnes-agees-622x0-1.jpg');
        $cloud0->setFileType($file_types[0]);
        $manager->persist($cloud0);

        $cloud1 = new Cloud();
        $cloud1->setFileName('video1');
        $cloud1->setUrl('https://www.youtube.com/embed/btIkYYTFqDQ');
        $cloud1->setFileType($file_types[1]);
        $manager->persist($cloud1);

        $cloud2 = new Cloud();
        $cloud2->setFileName('doc1');
        $cloud2->setUrl('http://www.credoc.fr/pdf/Rech/C256.pdf');
        $cloud2->setFileType($file_types[2]);
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