<?php

/**
 * Description of IndexController
 *
 * @author adriano
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {
    
    use ListingsTableTrait;

    public function indexAction() {
        $messages = array();
        if($this->flashMessenger()->hasMessages()){
            $messages = $this->flashMessenger()->getMessages();
        }
        return array('messages'=>$messages);//outra forma de retornar a renderização nas views
        //return new ViewModel(array('messages'=>$messages));
    }
    public function fooAction() {
        return new ViewModel();
    }

}
