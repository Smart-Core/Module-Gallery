<?php

namespace SmartCore\Module\Gallery;

use SmartCore\Bundle\CMSBundle\Module\ModuleBundle;

class GalleryModuleBundle extends ModuleBundle
{
    protected $adminMenuBeforeCode = '<i class="fa fa-object-ungroup"></i>';

    /**
     * Получить виджеты для рабочего стола.
     *
     * @return array
     */
    public function getDashboard()
    {
        $em     = $this->container->get('doctrine.orm.default_entity_manager');
        $r      = $this->container->get('router');

        $data = [
            'title' => 'Фотогалерея',
            'items' => [],
        ];

        foreach ($em->getRepository('GalleryModuleBundle:Gallery')->findAll() as $gallery) {
            $data['items']['edit_slider_'.$gallery->getId()] = [
                'title' => 'Редактировать галерею: <b>'.$gallery->getTitle().'</b>',
                'descr' => '',
                'url' => $r->generate('smart_module.gallery.admin_gallery', ['id' => $gallery->getId()]),
            ];
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getRequiredParams()
    {
        return [
            'gallery_id',
        ];
    }
}
