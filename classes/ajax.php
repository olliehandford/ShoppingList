<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/init.php';

class ajax {
    private $ListController;

    public function __construct() {
        $this->ListController = new ListController();
        if(isset($_GET['method']))
        {
            $method = $_GET['method'];
            if(method_exists($this, $method)) {
                $this->{$method}();
            }
        }
    }

    public function testAjax() {
        echo 'this is an ajax test';
    }

    public function getShoppingList() {
        header('Content-Type: application/json; charset=utf-8');
        echo $this->ListController->getList();
    }

    public function saveShoppingList() {
        if(isset($_GET['data'])) {

            $raw = $_GET['data'];

            // Check if valid json
            $json = json_decode($raw);

            if (json_last_error() === JSON_ERROR_NONE) {
                //TODO: Check if contains valid keys

                $this->ListController->saveList($raw);
            }
            else {
                die('Not valid JSON');
            }
        } else {
            die('No data set');
        }
    }
}

$ajax = new ajax();