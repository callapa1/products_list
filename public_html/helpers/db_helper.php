<?php
include '../db.php';

Class DbHelper {
    static function findLastID(){
        $result = $GLOBALS['conn']->query("SELECT * FROM products ORDER BY id DESC LIMIT 1");
        $row = $result->fetch_assoc();
        $id = $row['id'];
        return $id;
    }

    static function fetchProducts(){
        $products_sql = $GLOBALS['conn']->query("SELECT * FROM products");
        $indexed = [];

        while($row = $products_sql->fetch_assoc()){
            $indexed [$row['id']]= $row;
        }

        return $indexed;
    }

    static function fetchSpecs(){
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
}