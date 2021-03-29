<?php
include '../db.php';

function checkIfEmpty($array){
    foreach ($array as $item){
        return ($item !== NULL && $item !== FALSE && $item !== "");
    }
}

function findLastID(){
    $result = $GLOBALS['conn']->query("SELECT * FROM products ORDER BY id DESC LIMIT 1");
    $row = $result->fetch_assoc();
    $id = $row['id'];
    return $id;
}

function insertProduct($sku, $name, $price, $type_id, $type){
    $product_sql = "INSERT INTO products (sku, name, price, type_id, type) VALUES ('$sku', '$name', $price, $type_id, '$type')";
    $GLOBALS['conn']->query($product_sql);
}

function showProducts(){
    $products = array_reverse(fetchProducts(), true);
    $specs = array_reverse(fetchSpecs(), true);

    foreach($products as $id => $item){
        productCard($item, $specs[$id]);
    }

    $GLOBALS['conn']->close();
}

function fetchProducts(){
    $products_sql = $GLOBALS['conn']->query("SELECT * FROM products");
    $indexed = [];

    while($row = $products_sql->fetch_assoc()){
        $indexed [$row['id']]= $row;
    }

    return $indexed;
}

function fetchSpecs(){
    $book_sql      = $GLOBALS['conn']->query("SELECT * FROM book");
    $dvd_sql       = $GLOBALS['conn']->query("SELECT * FROM dvd");
    $furniture_sql = $GLOBALS['conn']->query("SELECT * FROM furniture");
    $results = [];

    while($books = $book_sql->fetch_assoc()){
        $results [$books['product_id']]= $books;
    }
    while($dvds = $dvd_sql->fetch_assoc()){
        $results [$dvds ['product_id']]= $dvds;
    }
    while($furniture = $furniture_sql->fetch_assoc()){
        $results [$furniture['product_id']]= $furniture;
    }

    return $results;
}

function productCard($item, $item_specs){
    echo '<div class="col-md-3">';
    echo '<div class="card border-dark mb-3">';
    echo "<input class='form-check-input position-static ml-3 mt-3' name='{$item["id"]}' type='checkbox' value='{$item["id"]}'>";
    echo '<div class="card-body text-dark text-center pt-2" style="height:186px">';
    echo '<h5 class="card-title">'. $item['sku'] . '</h5>';
    echo '<ul class="card-text list-unstyled">';
    echo '<li>' . $item['name'] . '</li>';
    echo '<li>' . $item['price'] . ' $' . '</li>';
    printSpecs($item['type'], $item_specs);
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

function printSpecs($type, $item_specs){
    if ($type == 'book'){
        printBookSpecs($item_specs);
    } elseif ($type == 'dvd'){
        printDvdSpecs($item_specs);
    } elseif ($type == 'furniture'){
        printFurnitureSpecs($item_specs);
    }
}

function printBookSpecs($book_specs){
    echo '<li>' . 'Weight: ' . $book_specs['weight'] . ' KG' .'</li>';
}
function printDvdSpecs($dvd_specs){
    echo '<li>' . 'Size: ' . $dvd_specs['size'] . ' MB' . '</li>' ;
}
function printFurnitureSpecs($furniture_specs){
    echo '<li>' . 'Dimension: '
                . $furniture_specs['height'] . 'x'
                . $furniture_specs['width']  . 'x'
                . $furniture_specs['length'] . ' CM' . '</li>';
}
?>