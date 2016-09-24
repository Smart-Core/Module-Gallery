<?php

namespace SmartCore\Module\Gallery\Form\Type;

use SmartCore\Module\Gallery\Entity\Photo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', null, ['attr' => ['autofocus' => 'autofocus']])
            ->add('file', FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'smart_module_gallery_photo';
    }
}
