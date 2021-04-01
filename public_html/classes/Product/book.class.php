<?php

include_once 'product.class.php';

Class Book extends Product {
    public $type = 'book';
    public $type_id = 1;
    public $weight;

    public function __construct($data){
        $sku    = strtoupper($data['sku']);
        $name   = $data['name'];
        $price  = $data['price'];
        $weight = $data['book_weight'];
        parent::__construct($sku, $name, $price, $this->type_id, $this->type);

        $this->weight = $weight;
        $this->insertIntoDB();
    }

    private function insertIntoDB(){
        $product_id = DbHelper::findLastID();
        $book_sql = "INSERT INTO book (weight, product_id) VALUES ($this->weight, $product_id)";
        $GLOBALS['conn']->query($book_sql);
        $GLOBALS['conn']->close();
    }
}

