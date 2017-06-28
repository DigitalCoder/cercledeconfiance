<?php
/**
 * Created by PhpStorm.
 * User: malik
 * Date: 13/06/17
 * Time: 11:50
 */

namespace AppBundle\Form;


use AppBundle\EventListener\UserUploadListener;
use AppBundle\Form\RegistrationType;
use AppBundle\Services\CurrentUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class EditProfileType extends AbstractType
{
    private $user;
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('address', AddressType::class, ['label' => ' '])
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('firstname', TextType::class, ['label' => 'Prénom'])
            ->add('relation', TextType::class, ['label' => 'Lien avec le centre du cercle'])
            ->add('phone_number', TextType::class, ['label' => 'Numéro de téléphone'])
            ->add('avatar', FileType::class, ['label' => 'Photo', 'data_class' => null, 'required' => false]);
    }


    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}