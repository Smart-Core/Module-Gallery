<?php

namespace SmartCore\Module\Gallery\Form\Type;

use SmartCore\Bundle\CMSBundle\Module\AbstractNodePropertiesFormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class NodePropertiesFormType extends AbstractNodePropertiesFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $galleries = [];
        foreach ($this->em->getRepository('GalleryModuleBundle:Gallery')->findAll() as $gallery) {
            $galleries[(string) $gallery] = $gallery->getId();
        }

        $builder
            ->add('gallery_id', ChoiceType::class, ['choices' => $galleries])
        ;
    }

    public function getBlockPrefix()
    {
        return 'smart_module_gallery_node_properties';
    }
}
