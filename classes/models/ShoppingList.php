<?php

class ShoppingList {

    private $listFile;

    public function __construct() {
        $this->listFile = $_SERVER['DOCUMENT_ROOT'] . '/data/list.json';
    }

    public function saySomething() {
        echo '1dadasd hello hello';
    }

    public function getListArray(): array {
        $contents = $this->getListJson();
        if(!empty($contents)) {
        
            $json = json_decode($contents);

            return $json;
        }
        return [];
    }

    public function getListJson(): string {
        if(file_exists($this->listFile)) {
            $contents = file_get_contents($this->listFile);
            return $contents;
        }
        return '';
    }

    public function saveListJson(string $list): void {
        file_put_contents($this->listFile, $list);
    }
}
