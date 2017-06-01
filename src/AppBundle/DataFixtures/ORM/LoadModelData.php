<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 17:45
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Model;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadModelData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $brands = $manager->getRepository('AppBundle:Brand')->findAll();
        $types_object = $manager->getRepository('AppBundle:Type_object')->findAll();

        $model0 = new Model();
        $model0->setBrand($brands[0]);
        $model0->setTypeObject($types_object[0]);
        $model0->setDescription('Ceci est un thermomètre Hitachi');
        $model0->setReference('UX220AD');
        $model0->setDocUrl('http://www.chirped.org/c/c3/thermometres%20et%20prise%20de%20temperature.pdf');
        $manager->persist($model0);

        $model1 = new Model();
        $model1->setBrand($brands[1]);
        $model1->setTypeObject($types_object[1]);
        $model1->setDescription('Ceci est une sonde d\'humidité WCS');
        $model1->setReference('w1ldc0d3');
        $model1->setDocUrl('http://www.chirped.org/c/c3/thermometres%20et%20prise%20de%20temperature.pdf');
        $manager->persist($model1);

        $model2 = new Model();
        $model2->setBrand($brands[2]);
        $model2->setTypeObject($types_object[2]);
        $model2->setDescription('Ceci est un capteur anti intrusion Siemens');
        $model2->setReference('UShallNotPass');
        $model2->setDocUrl('http://www.chirped.org/c/c3/thermometres%20et%20prise%20de%20temperature.pdf');
        $manager->persist($model2);

        $model3 = new Model();
        $model3->setBrand($brands[2]);
        $model3->setTypeObject($types_object[3]);
        $model3->setDescription('Ceci est un detecteur de fumée Siemens');
        $model3->setReference('R2D2');
        $model3->setDocUrl('http://www.chirped.org/c/c3/thermometres%20et%20prise%20de%20temperature.pdf');
        $manager->persist($model3);

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
