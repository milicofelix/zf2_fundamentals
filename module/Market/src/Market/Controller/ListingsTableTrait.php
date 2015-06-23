<?php

namespace Market\Controller;

/**
 * Description of ListingsTableTrait
 *
 * @author adriano
 */
Trait ListingsTableTrait {
    
    private $listingsTable;
    
    public function setListingsTable($listingsTable){
        $this->listingsTable = $listingsTable;
    }
}
