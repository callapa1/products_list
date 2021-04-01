<?php

Class Product {
    private $sku;
    private $name;
    private $price;
    private $type_id;
    private $type;

    protected function __construct($sku, $name, $price, $type_id, $type){
        $this->sku   = $sku;
        $this->name  = $name;
        $this->price = $price;
        $this->type_id = $type_id;
        $this->type = $type;

        $this->insertProductIntoDB();
    }

    private function insertProductIntoDB() {
        $product_sql = "INSERT INTO products (sku, name, price, type_id, type) VALUES ('$this->sku',
                                                                                       '$this->name',
                                                                                        $this->price,
                                                                                        $this->type_id,
                                                                                       '$this->type')";
        $GLOBALS['conn']->query($product_sql);
    }
}

