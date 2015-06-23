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
use Market\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $controllerManager) {
        
        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
        //$categories = $sm->get('categories');
        
        $indexController = new IndexController();
//        $indexController->setCategories($categories);
//        $indexController->setPostForm($sm->get('market-post-form'));
        $indexController->setListingsTable($sm->get('listings-table'));
        
        return $indexController;
    }

}
