<?php

namespace Product;

include_once 'product.class.php';

Class Furniture extends Product {
    public $type = 'furniture';
    public $type_id = 3;
    public $height;
    public $width;
    public $length;

    public function __construct($sku, $name, $price, $height, $width, $length){
        parent::__construct($sku, $name, $price);
        $this->height = $height;
        $this->width  = $width;
        $this->length = $length;

        insertProduct($sku, $name, $price, $this->type_id, $this->type);
        $this->insertFurniture($height, $width, $length);
    }

    private function insertFurniture($height, $width, $length){
        $product_id = findLastID();

        $furniture_sql = "INSERT INTO furniture (height, width, length, product_id) VALUES ($height, $width, $length, $product_id)";
        $GLOBALS['conn']->query($furniture_sql);
        $GLOBALS['conn']->close();
    }
}

