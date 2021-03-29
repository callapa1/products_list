<?php

namespace Product;

abstract Class Product {
    private $sku;
    private $name;
    private $price;

    protected function __construct($sku, $name, $price){
        $this->sku   = $sku;
        $this->name  = $name;
        $this->price = $price;
    }
}

