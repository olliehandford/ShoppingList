<?php 

class ListController {

    private $ShoppingList;

    public function __construct() {
        $this->ShoppingList = new ShoppingList();
    }
    
    public function getList() {
        
        return $this->ShoppingList->getListJson();
    }

    public function saveList(string $list)
    {
        if(!empty($list))
        {
            $this->ShoppingList->saveListJson($list);
        }
    }
}