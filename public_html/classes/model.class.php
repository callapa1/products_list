<?php
include_once '../db.php';
include_once 'functions.php';
include_once './classes/Product/book.class.php';
include_once './classes/Product/dvd.class.php';
include_once './classes/Product/furniture.class.php';

Class Model {
    public function insert(){
        if (isset($_POST['submit'])){
            checkIfEmpty($_POST);
            $this->createItem($_POST);
            echo("<script>location.href = '/index.php';</script>");
        } elseif(isset($_POST['cancel'])){
            header('location: index.php');
        }
    }

    private function createItem($data){
        $type = $data['type'];
        if ($type == 'book'){
            $this->createBook($data);
        } elseif ($type == 'dvd'){
            $this->createDvd($data);
        } elseif ($type == 'furniture'){
            $this->createFurniture($data);
        }
    }

    private function createBook($data){
        $sku    = strtoupper($data['sku']);
        $name   = $data['name'];
        $price  = $data['price'];
        $weight = $data['book_weight'];

        $book = new Product\Book($sku, $name, $price, $weight);
    }

    private function createDvd($data){
        $sku   = strtoupper($data['sku']);
        $name  = $data['name'];
        $price = $data['price'];
        $size  = $data['dvd_size'];

        $dvd = new Product\Dvd($sku, $name, $price, $size);
    }

    private function createFurniture($data){
        $sku    = strtoupper($data['sku']);
        $name   = $data['name'];
        $price  = $data['price'];
        $height = $data['furn_height'];
        $width  = $data['furn_width'];
        $length = $data['furn_length'];

        $furniture = new Product\Furniture($sku, $name, $price, $height, $width, $length);
    }
}