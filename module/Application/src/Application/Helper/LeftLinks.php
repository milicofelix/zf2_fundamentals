<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Helper;

/**
 * Description of LeftLinks
 *
 * @author adriano
 */
use Zend\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper {

    public function __invoke(array $values, $urlPrefix) {

        $html = '<ul style="list-style-type:none">' . PHP_EOL;
        foreach ($values as $item) {
            $html.= sprintf("<li><a href=\"%s/%s\">%s</a></li>\n", $urlPrefix, $item, $item);
        }
        $html .= '</ul>' . PHP_EOL;
        return $html;
    }

}
