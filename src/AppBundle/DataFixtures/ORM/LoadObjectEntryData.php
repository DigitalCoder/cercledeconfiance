<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 16:42
 */

namespace AppBundle\DataFixtures\ORM;

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