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

    public function indexAction() {
        return new ViewModel();
    }
    public function fooAction() {
        return new ViewModel();
    }

}
