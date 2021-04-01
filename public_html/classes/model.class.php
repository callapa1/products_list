<?php
include_once '../db.php';
include_once './classes/Product/product_types.php';
include_once './helpers/db_helper.php';
include_once './helpers/validation_helper.php';
include_once './helpers/string_helper.php';


Class Model {
    public function insert(){
        if (isset($_POST['submit'])){
            ValidationHelper::checkIfEmpty($_POST);
            $class_name = StringHelper::capitalizeFirst($_POST['type']);
            $this->createItem($class_name, $_POST);
            // echo("<script>location.href = '/index.php';</script>");
            header('location: index.php');
        } elseif(isset($_POST['cancel'])){
            header('location: index.php');
        }
    }

    private function createItem($class_name, $data){
        if (class_exists($class_name)) {
            $object = new $class_name($data);
        }
    }
}