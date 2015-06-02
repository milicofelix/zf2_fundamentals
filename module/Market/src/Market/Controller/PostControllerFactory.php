<?php

namespace Market\Controller;

/**
 * Description of PostControllerFactory
 *
 * @author adriano
 */
//use Zend\Mvc\Controller\AbstractActionController;
//use Zend\View\Model\ViewModel;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
//use Market\Controller\PostController;

class PostControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $controllerManager) {
        
        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
        $categories = $sm->get('categories');
        
        $postController = new \Market\Controller\PostController();
        $postController->setCategories($categories);
        
        return $postController;
    }

}
