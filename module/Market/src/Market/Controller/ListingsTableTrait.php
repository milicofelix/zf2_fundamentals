<?php

namespace Market\Controller;

/**
 * Description of ListingsTableTrait
 *
 * @author adriano
 */
Trait ListingsTableTrait {
    
    private $listingsTable;
    
    public function setListsTable($listingsTable){
        $this->listingsTable = $listingsTable;
    }
}
