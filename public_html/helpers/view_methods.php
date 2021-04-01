<?php
include 'db_helper.php';

Class ViewMethods {
  static function showProducts(){
      $products = array_reverse(DbHelper::fetchProducts(), true);
      $specs = array_reverse(DbHelper::fetchSpecs(), true);

      foreach($products as $id => $item){
          self::productCard($item, $specs[$id]);
      }
      $GLOBALS['conn']->close();
  }

  static function productCard($item, $item_specs){
      echo '<div class="col-md-3">';
      echo '<div class="card border-dark mb-3">';
      echo "<input class='form-check-input position-static ml-3 mt-3' name='{$item["id"]}' type='checkbox' value='{$item["id"]}'>";
      echo '<div class="card-body text-dark text-center pt-2" style="height:186px">';
      echo '<h5 class="card-title">'. $item['sku'] . '</h5>';
      echo '<ul class="card-text list-unstyled">';
      echo '<li>' . $item['name'] . '</li>';
      echo '<li>' . $item['price'] . ' $' . '</li>';
      self::printSpecs($item['type'], $item_specs);
      echo '</div>';
      echo '</div>';
      echo '</div>';
  }

  static function printSpecs($type, $item_specs){
      if ($type == 'book'){
          self::printBookSpecs($item_specs);
      } elseif ($type == 'dvd'){
          self::printDvdSpecs($item_specs);
      } elseif ($type == 'furniture'){
          self::printFurnitureSpecs($item_specs);
      }
  }

  static function printBookSpecs($book_specs){
      echo '<li>' . 'Weight: ' . $book_specs['weight'] . ' KG' .'</li>';
  }
  static function printDvdSpecs($dvd_specs){
      echo '<li>' . 'Size: ' . $dvd_specs['size'] . ' MB' . '</li>' ;
  }
  static function printFurnitureSpecs($furniture_specs){
      echo '<li>' . 'Dimension: '
                  . $furniture_specs['height'] . 'x'
                  . $furniture_specs['width']  . 'x'
                  . $furniture_specs['length'] . ' CM' . '</li>';
  }
}