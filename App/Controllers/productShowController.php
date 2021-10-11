<?php
require '../DB/Database.php';
require '../Models/Entry.php';


$dbOBJ = new Database();
$handler = $dbOBJ->connect();

$statement = $handler->query("select
                                    `product`.`ID` as productID, 
                                    `SKU`,
                                    `productName`,
                                    `price`,
                                    `dvdID`,
                                    `furnitureID`,
                                    `bookID`,
                                    CASE
                                    WHEN `dvdID` is not null THEN concat('MB: ', `sizeMB`)
                                    WHEN `furnitureID` is not null THEN concat('dimentions: ', `height`, 'X', `width`, 'X', `length`)
                                    WHEN `bookID` is not null THEN concat('KG: ', `weightKG`)
                                    END as `info`
                                    from `product`
                                    left join `dvd` on `product`.`dvdID` = `dvd`.`ID`
                                    left join `furniture` on `product`.`furnitureID` = `furniture`.`ID`
                                    left join `book` on `product`.`bookID` = `book`.`ID`
");

$statement->setFetchMode(PDO::FETCH_CLASS, 'Entry');
$cont = array();
while ($row = $statement->fetch()) {
    array_push($cont, $row);

}
echo json_encode($cont);