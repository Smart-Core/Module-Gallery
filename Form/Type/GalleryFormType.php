<?php

namespace SmartCore\Module\Gallery\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GalleryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, ['attr' => ['autofocus' => 'autofocus']])
            ->add('order_albums_by', 'choice', [
                'choices' => [
                    0 => 'По дате создания',
                    1 => 'По заданной позиции (по возрастанию)',
                    2 => 'По заданной позиции (по убыванию)',
                    //2 => 'По дате последнего обновления', // @todo
                ],
            ])
            ->add('media_collection')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'SmartCore\Module\Gallery\Entity\Gallery',
        ]);
    }

    public function getName()
    {
        return 'smart_module_gallery';
    }
}
