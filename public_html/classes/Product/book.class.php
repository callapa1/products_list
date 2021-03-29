<?php

namespace Product;

include_once 'product.class.php';

Class Book extends Product {
    public $type = 'book';
    public $type_id = 1;
    public $weight;

    public function __construct($sku, $name, $price, $weight){
        parent::__construct($sku, $name, $price);
        $this->weight = $weight;

        insertProduct($sku, $name, $price, $this->type_id, $this->type);
        $this->insertBook($weight);
    }

    private function insertBook($weight){
        $product_id = findLastID();

        $book_sql = "INSERT INTO book (weight, product_id) VALUES ($weight, $product_id)";
        $GLOBALS['conn']->query($book_sql);
        $GLOBALS['conn']->close();
    }
}

