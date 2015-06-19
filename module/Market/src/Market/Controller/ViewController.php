<?php

namespace Market\Controller;

/**
 * Description of ViewController
 *
 * @author adriano
 */
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController {
    
    use ListingsTableTrait;
    
    public function indexAction() {
        $category = $this->params()->fromRoute('category');
        return new ViewModel(array('category'=> $category));
    }
    public function itemAction(){
        $itemId = $this->params()->fromRoute('itemId');
        if(!$itemId){
            $this->flashMessenger()->addMessage('Item not found!');
            return $this->redirect()->toRoute('market');
        }
        return new ViewModel(array('itemId' => $itemId));
    }
}
