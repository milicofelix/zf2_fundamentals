<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Market\Form\PostFilter;
/**
 * Description of PostFilterFactory
 *
 * @author adriano
 */
class PostFilterFactory implements FactoryInterface {
    
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sm) {
        $filter = new PostFilter();
        $filter->setCategories($sm->get('categories'));
        $filter->buildFilter();
        
        return $filter;
    }
    
}
