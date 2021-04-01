<?php

include_once 'product.class.php';

Class Furniture extends Product {
    public $type = 'furniture';
    public $type_id = 3;
    public $height;
    public $width;
    public $length;

    public function __construct($data){
        $sku    = strtoupper($data['sku']);
        $name   = $data['name'];
        $price  = $data['price'];
        $height = $data['furn_height'];
        $width  = $data['furn_width'];
        $length = $data['furn_length'];
        parent::__construct($sku, $name, $price, $this->type_id, $this->type);

        $this->height = $height;
        $this->width  = $width;
        $this->length = $length;
        $this->insertIntoDB();
    }

    private function insertIntoDB(){
        $product_id = DbHelper::findLastID();

        $furniture_sql = "INSERT INTO furniture (height, width, length, product_id) VALUES ($this->height,
                                                                                            $this->width,
                                                                                            $this->length,
                                                                                            $product_id)";
        $GLOBALS['conn']->query($furniture_sql);
        $GLOBALS['conn']->close();
    }
}

