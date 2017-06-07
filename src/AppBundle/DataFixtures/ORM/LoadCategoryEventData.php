<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 15:06
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category_event;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryEventData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $category_event0 = new Category_event();
        $category_event0->setName('medical');
        $category_event0->setColor("#00FF00");
        $manager->persist($category_event0);

        $category_event1 = new Category_event();
        $category_event1->setName('social');
        $category_event1->setColor("#FFFF00");
        $manager->persist($category_event1);

        $category_event2 = new Category_event();
        $category_event2->setName('loisir');
        $category_event2->setColor("#0000FF");
        $manager->persist($category_event2);

        $category_event3 = new Category_event();
        $category_event3->setName('administratif');
        $category_event3->setColor("#FF0000");
        $manager->persist($category_event3);

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