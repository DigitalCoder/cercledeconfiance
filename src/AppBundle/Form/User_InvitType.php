<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 09/06/17
 * Time: 10:55
 */

namespace AppBundle\Form;

use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class User_InvitType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//                ->add('adminCircle')
//                ->add('circleCenter')
//                ->add('callAccess')
//                ->add('wallAccess')
//                ->add('cloudAccess')
//                ->add('agendaAccess')
//                ->add('user', CollectionType::class, array('entry_type'=>RegistrationFormType::class, "label"=>"Renseigner la personne a surveiller"))
            ->add('user', RegistrationType::class, array("label"=>"S'Enregistrer"))
//            ->add('address', AddressType::class)
            ->add('save', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Circle_user'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_circle_user';
    }


}