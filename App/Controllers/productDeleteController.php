<?php
require '../DB/Database.php';
$productIDArray = isset($_POST['productIDArray']) ? $_POST['productIDArray'] : null;
$dvdIDArray = isset($_POST['dvdIDArray']) ? $_POST['dvdIDArray'] : null;
$furnitureIDArray = isset($_POST['furnitureIDArray']) ? $_POST['furnitureIDArray'] : null;
$bookIDArray = isset($_POST['bookIDArray']) ? $_POST['bookIDArray'] : null;

$DBOBJ = new Database();
$handler = $DBOBJ->connect();
$helper = '';
$sql = '';
if ($productIDArray != null) {
//    foreach ($productIDArray as $item) {
//        $helper .= $item . ', ';
//    }
//    $helper = substr_replace($helper ,"",-2);
//    $sql = "Delete from product where ID in (".$helper.")";
    $sql = "Delete from product where ID in (".join(", ", $productIDArray).")";
    $statement = $handler->query($sql);
}

if ($dvdIDArray != null) {
    $sql = "Delete from dvd where ID in (".join(", ", $dvdIDArray).")";
    $statement = $handler->query($sql);
}

if ($furnitureIDArray != null) {
    $sql = "Delete from furniture where ID in (".join(", ", $furnitureIDArray).")";
    $statement = $handler->query($sql);
}

if ($bookIDArray != null) {
    $sql = "Delete from book where ID in (".join(", ", $bookIDArray).")";
    $statement = $handler->query($sql);
}


