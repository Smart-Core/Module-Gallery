<?php

namespace SmartCore\Module\Gallery\Form\Type;

use SmartCore\Module\Gallery\Entity\Album;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlbumFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('is_enabled', null, ['required' => false])
            ->add('title')
            ->add('position')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Album::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'smart_module_gallery_album';
    }
}
