<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 30/05/17
 * Time: 11:26
 */

namespace UserBundle\DataFixtures\ORM;


use AppBundle\Entity\Address;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Model\UserManagerInterface;




class LoadUserData extends AbstractFixture
    implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /** @var $userManager UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');

        $user0 = $userManager->createUser();
        $user0->setUsername('admin');
        $user0->setEmail('julienmartin.opto@gmail.com');
        $user0->setPlainPassword('admin');
        $user0->setEnabled(true);
        $user0->addRole('ROLE_SUPER_ADMIN');
        $user0->setAvatar('http://icons.iconarchive.com/icons/mattahan/ultrabuuf/256/Comics-Mask-icon.png');
        $user0->setName('Martin');
        $user0->setFirstname('Julien');
        $user0->setRelation('Super Dev');
        $user0->setPhoneNumber('0650730766');
        $address0 = new Address();
        $address0->setAddress('12 rue des champignons 45000 orléans');
        $user0->setAddress($address0);
        $this->addReference('user-super-admin', $user0);
        $userManager->updateUser($user0);

        $user1 = $userManager->createUser();
        $user1->setUsername('julien');
        $user1->setEmail('test@gmail.com');
        $user1->setPlainPassword('admin');
        $user1->setEnabled(true);
        $user1->addRole('ROLE_ADMIN');
        $user1->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user1->setName('Martin');
        $user1->setFirstname('Julien');
        $user1->setRelation('Dev');
        $user1->setPhoneNumber('0123456789');
        $address1 = new Address();
        $address1->setAddress('LabO 45000 orléans');
        $user1->setAddress($address1);
        $this->addReference('user-admin', $user1);
        $userManager->updateUser($user1);

        $user2 = $userManager->createUser();
        $user2->setUsername('guillaume');
        $user2->setEmail('test2@gmail.com');
        $user2->setPlainPassword('admin');
        $user2->setEnabled(true);
        $user2->addRole('ROLE_ADMIN');
        $user2->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user2->setName('Koffi');
        $user2->setFirstname('Guillaume');
        $user2->setRelation('Dev');
        $user2->setPhoneNumber('0123456789');
        $address2 = new Address();
        $address2->setAddress('LabO 45000 orléans');
        $user2->setAddress($address2);
        $this->setReference('user-admin', $user2);
        $userManager->updateUser($user2);

        $user3 = $userManager->createUser();
        $user3->setUsername('sylvain');
        $user3->setEmail('test3@gmail.com');
        $user3->setPlainPassword('admin');
        $user3->setEnabled(true);
        $user3->addRole('ROLE_ADMIN');
        $user3->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user3->setName('Jan');
        $user3->setFirstname('Sylvain');
        $user3->setRelation('Dev');
        $user3->setPhoneNumber('0123456789');
        $address3 = new Address();
        $address3->setAddress('LabO 45000 orléans');
        $user3->setAddress($address3);
        $this->setReference('user-admin', $user3);
        $userManager->updateUser($user3);

        $user4 = $userManager->createUser();
        $user4->setUsername('maxime');
        $user4->setEmail('test4@gmail.com');
        $user4->setPlainPassword('admin');
        $user4->setEnabled(true);
        $user4->addRole('ROLE_ADMIN');
        $user4->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user4->setName('Cabezas');
        $user4->setFirstname('Maxime');
        $user4->setRelation('Dev');
        $user4->setPhoneNumber('0123456789');
        $address4 = new Address();
        $address4->setAddress('LabO 45000 orléans');
        $user4->setAddress($address4);
        $this->setReference('user-admin', $user4);
        $userManager->updateUser($user4);

        $user5 = $userManager->createUser();
        $user5->setUsername('georgette');
        $user5->setEmail('test5@gmail.com');
        $user5->setPlainPassword('admin');
        $user5->setEnabled(true);
        $user5->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user5->setName('Pinel');
        $user5->setFirstname('Georgette');
        $user5->setRelation('Centre');
        $user5->setPhoneNumber('0123456789');
        $address5 = new Address();
        $address5->setAddress('312 rue des champignons 45555 orléans');
        $user5->setAddress($address5);
        $this->addReference('user', $user5);
        $userManager->updateUser($user5);

        $user6 = $userManager->createUser();
        $user6->setUsername('gaston');
        $user6->setEmail('test6@gmail.com');
        $user6->setPlainPassword('admin');
        $user6->setEnabled(true);
        $user6->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user6->setName('Rostand');
        $user6->setFirstname('Gaston');
        $user6->setRelation('Frère');
        $user6->setPhoneNumber('0123456789');
        $address6 = new Address();
        $address6->setAddress('12 rue des moules 45666 orléans');
        $user6->setAddress($address6);
        $this->setReference('user', $user6);
        $userManager->updateUser($user6);

        $user7 = $userManager->createUser();
        $user7->setUsername('guenièvre');
        $user7->setEmail('test7gmail.com');
        $user7->setPlainPassword('admin');
        $user7->setEnabled(true);
        $user7->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user7->setName('De la Bibiche');
        $user7->setFirstname('Guenièvre');
        $user7->setRelation('Centre');
        $user7->setPhoneNumber('0123456789');
        $address7 = new Address();
        $address7->setAddress('Château du bois 45777 orléans');
        $user7->setAddress($address7);
        $this->setReference('user', $user7);
        $userManager->updateUser($user7);

        $user8 = $userManager->createUser();
        $user8->setUsername('léontine');
        $user8->setEmail('test8@gmail.com');
        $user8->setPlainPassword('admin');
        $user8->setEnabled(true);
        $user8->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user8->setName('Dupuis');
        $user8->setFirstname('Léontine');
        $user8->setRelation('Soeur');
        $user8->setPhoneNumber('0123456789');
        $address8 = new Address();
        $address8->setAddress('impasse du sapin 45888 orléans');
        $user8->setAddress($address8);
        $this->setReference('user', $user8);
        $userManager->updateUser($user8);

        $user9 = $userManager->createUser();
        $user9->setUsername('firmin');
        $user9->setEmail('test9@gmail.com');
        $user9->setPlainPassword('admin');
        $user9->setEnabled(true);
        $user9->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user9->setName('Dupuis');
        $user9->setFirstname('Firmin');
        $user9->setRelation('Centre');
        $user9->setPhoneNumber('0123456789');
        $address9 = new Address();
        $address9->setAddress('Maison de retraite 45999 orléans');
        $user9->setAddress($address9);
        $this->setReference('user', $user9);
        $userManager->updateUser($user9);

        $user10 = $userManager->createUser();
        $user10->setUsername('ernesto');
        $user10->setEmail('test10gmail.com');
        $user10->setPlainPassword('admin');
        $user10->setEnabled(true);
        $user10->setAvatar('https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png');
        $user10->setName('Grimaldi');
        $user10->setFirstname('Ernesto');
        $user10->setRelation('Centre');
        $user10->setPhoneNumber('0123456789');
        $address10 = new Address();
        $address10->setAddress('Funérarium 45100 orléans');
        $user10->setAddress($address10);
        $this->setReference('user', $user10);
        $userManager->updateUser($user10);
    }

    /**
     * Sets the container.
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
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