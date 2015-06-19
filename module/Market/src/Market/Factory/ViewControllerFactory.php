<?php

namespace Market\Factory;

/**
 * Description of PostControllerFactory
 *
 * @author adriano
 */
//use Zend\Mvc\Controller\AbstractActionController;
//use Zend\View\Model\ViewModel;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\ViewController;

class ViewControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $controllerManager) {
        
        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
//        $categories = $sm->get('categories');
        
        $viewController = new ViewController();
//        $viewController->setCategories($categories);
//        $viewController->setPostForm($sm->get('market-post-form'));
        $viewController->setListsTable($sm->get('listings-table'));
        
        return $viewController;
    }

}
