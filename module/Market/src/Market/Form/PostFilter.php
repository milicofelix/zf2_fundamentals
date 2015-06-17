<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\Regex;

/**
 * Description of PostFormFilter
 *
 * @author adriano
 */
class PostFilter extends InputFilter {

    private $categories;

    public function setCategories($categories) {
        $this->categories = $categories;
    }

    public function buildFilter() {
        $category = new Input('category');
        $category->getFilterChain()
                ->attachByName('StringTrim')
                ->attachByName('StripTags')
                ->attachByName('StringToLower');
        $category->getValidatorChain()
                ->attachByName('InArray', array('haystack' => $this->categories));

        $title = new Input('title');
        $title->getFilterChain()
                ->attachByName('StringTrim')
                ->attachByName('StripTags');

        $titleRegex = new Regex(array('pattern' => '/^[a-zA-Z0-9 ]*$/'));
        $titleRegex->setMessage('Title should only cotain numbers, letters or spaces!');

        $title->getValidatorChain()
                ->attach($titleRegex)
                ->attachByName('StringLength', array('min' => 1, 'max' => '128'));

        $this->add($category)
                ->add($title);
    }

}
