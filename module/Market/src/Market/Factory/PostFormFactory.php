<?php

namespace Market\Factory;

/**
 * Description of PostControllerFactory
 *
 * @author adriano
 */

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;


class PostFormFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $sm) {
            
        $categories = $sm->get('categories');
        
        $form = new PostForm();
        $form->setCategories($categories);
        $form->buildForm();
        $form->setInputFilter($sm->get('market-post-filter'));
        
        return $form;
    }

}
