<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 31/05/17
 * Time: 15:25
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Wall;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadWallData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $wall0 = new Wall();
        $wall0->setContent('Salut ! Ca va vous ? Moi tout va bien au cas où vous vous le demanderiez ! Je passerai vous rendre visite très bientôt ! Allez a+ !');
        $manager->persist($wall0);

        $wall1 = new Wall();
        $wall1->setContent('Hey papy je viens manger ce midi ?');
        $manager->persist($wall1);

        $wall2 = new Wall();
        $wall2->setContent('Vous avez vu ce week-end il y a le rassemblement annuel des collectionneurs de chaussettes !');
        $manager->persist($wall2);

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