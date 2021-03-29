<?php

namespace Product;

include_once 'product.class.php';

Class Dvd extends Product {
    public $type = 'dvd';
    public $type_id = 2;
    public $size;

    public function __construct($sku, $name, $price, $size){
        parent::__construct($sku, $name, $price);
        $this->size = $size;

        insertProduct($sku, $name, $price, $this->type_id, $this->type);
        $this->insertDvd($size);
    }

    private function insertDvd($size){
        $product_id = findLastID();

        $dvd_sql = "INSERT INTO dvd (size, product_id) VALUES ($size, $product_id)";
        $GLOBALS['conn']->query($dvd_sql);
        $GLOBALS['conn']->close();
    }
}

