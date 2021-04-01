<?php

include_once 'product.class.php';

Class Dvd extends Product {
    public $type = 'dvd';
    public $type_id = 2;
    public $size;

    public function __construct($data){
        $sku   = strtoupper($data['sku']);
        $name  = $data['name'];
        $price = $data['price'];
        $size  = $data['dvd_size'];
        parent::__construct($sku, $name, $price, $this->type_id, $this->type);

        $this->size = $size;
        $this->insertIntoDB();
    }

    private function insertIntoDB(){
        $product_id = DbHelper::findLastID();
        $dvd_sql = "INSERT INTO dvd (size, product_id) VALUES ($this->size, $product_id)";
        $GLOBALS['conn']->query($dvd_sql);
        $GLOBALS['conn']->close();
    }
}

