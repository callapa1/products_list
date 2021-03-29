<?php
include '../db.php';

if (isset($_POST['delete_items'])){
    delete_all_products();
}
function delete_all_products(){
    $ids = $_POST;
    unset($ids['delete_items']);
    $ids_string = implode(", ", $ids);
    $pre_delete_query  = "DELETE FROM products WHERE id IN ()";
    $delete_sql = substr_replace($pre_delete_query,$ids_string,34, 0);

    $GLOBALS['conn']->query($delete_sql);
    $GLOBALS['conn']->close();

    header ("location: index.php");
}
?>