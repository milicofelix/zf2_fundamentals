<?php

/**
 * Description of IndexController
 *
 * @author adriano
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Zend\View\Helper\FlashMessenger;

class IndexController extends AbstractActionController {

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
