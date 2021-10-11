<?php
require '../DB/Database.php';
require '../Models/Product.php';
require '../Models/DVD.php';
require '../Models/Furniture.php';
require '../Models/Book.php';
/*
$SKU = $_POST['sku'];
$productName = $_POST['productName'];
$price = $_POST['price'];

echo "sku: " . $SKU . "\n";
echo "productName: " . $productName . "\n";
echo "price: " . $price . "\n";
*/
$info = array("status" => "OK", "message" => "");

$switcher = $_POST['switcher'];

$dbOBJ = new Database();
$handler = $dbOBJ->connect();
try {

    switch ($switcher) {
        case 'dvd':
            //dvd OBJ
            $dvdOBJ = new DVD(null, $_POST['sku'], $_POST['productName'], $_POST['price'], null, $_POST['sizeMB']);
            $statement = $handler->prepare("INSERT INTO `dvd` (`sizeMB`) VALUES (:sizeMB)");
            $statement->bindValue(':sizeMB', $dvdOBJ->getSizeMB(), PDO::PARAM_STR);
            $statement->execute();

            $dvdOBJ->setDvdID($handler->lastInsertId());

            $statement = $handler->prepare("INSERT INTO `product`
                                                (`SKU`,
                                                `productName`,
                                                `price`,
                                                `dvdID`,
                                                `furnitureID`,
                                                `bookID`)
                                                VALUES
                                                (:SKU,
                                                :productName,
                                                :price,
                                                :dvdID,
                                                :furnitureID,
                                                :bookID)");

            $statement->bindValue(':SKU', $dvdOBJ->getSKU(), PDO::PARAM_STR);
            $statement->bindValue(':productName', $dvdOBJ->getProductName(), PDO::PARAM_STR);
            $statement->bindValue(':price', $dvdOBJ->getPrice(), PDO::PARAM_STR);
            $statement->bindValue(':dvdID', $dvdOBJ->getDvdID(), PDO::PARAM_INT);
            $statement->bindValue(':furnitureID', null, PDO::PARAM_NULL);
            $statement->bindValue(':bookID', null, PDO::PARAM_NULL);

            $statement->execute();

            break;

        case 'furniture':
            $furnitureOBJ = new furniture(null, $_POST['sku'], $_POST['productName'], $_POST['price'], null,
                $_POST['height'], $_POST['width'], $_POST['length']);
            $statement = $handler->prepare("INSERT INTO `furniture`
                                            (`height`,
                                            `width`,
                                            `length`)
                                            VALUES (:height, :width, :length)");

            $statement->bindValue(':height', $furnitureOBJ->getHeight(), PDO::PARAM_STR);
            $statement->bindValue(':width', $furnitureOBJ->getWidth(), PDO::PARAM_STR);
            $statement->bindValue(':length', $furnitureOBJ->getLength(), PDO::PARAM_STR);

            $statement->execute();
            $furnitureOBJ->setFurnitureID($handler->lastInsertId());

            $statement = $handler->prepare("INSERT INTO `product`
                                            (`SKU`,
                                            `productName`,
                                            `price`,
                                            `dvdID`,
                                            `furnitureID`,
                                            `bookID`)
                                            VALUES 
                                            (:SKU,
                                            :productName,
                                            :price,
                                            :dvdID,
                                            :furnitureID,
                                            :bookID)");

            $statement->bindValue(':SKU', $furnitureOBJ->getSKU(), PDO::PARAM_STR);
            $statement->bindValue(':productName', $furnitureOBJ->getProductName(), PDO::PARAM_STR);
            $statement->bindValue(':price', $furnitureOBJ->getPrice(), PDO::PARAM_STR);
            $statement->bindValue(':dvdID', null, PDO::PARAM_NULL);
            $statement->bindValue(':furnitureID', $furnitureOBJ->getFurnitureID(), PDO::PARAM_INT);
            $statement->bindValue(':bookID', null, PDO::PARAM_NULL);

            $statement->execute();

            break;

        case 'book':
            $bookOBJ = new Book(null, $_POST['sku'], $_POST['productName'], $_POST['price'], null, $_POST['weightKG']);
            $statement = $handler->prepare("INSERT INTO `book`(`weightKG`) VALUES (:weightKG)");

            $statement->bindValue('weightKG', $bookOBJ->getWeightKG());

            $statement->execute();

            $bookOBJ->setBookID($handler->lastInsertId());

            $statement = $handler->prepare("INSERT INTO `product`
                                            (`SKU`,
                                            `productName`,
                                            `price`,
                                            `dvdID`,
                                            `furnitureID`,
                                            `bookID`)
                                            VALUES 
                                            (:SKU,
                                            :productName,
                                            :price,
                                            :dvdID,
                                            :furnitureID,
                                            :bookID)");

            $statement->bindValue(':SKU', $bookOBJ->getSKU(), PDO::PARAM_STR);
            $statement->bindValue(':productName', $bookOBJ->getProductName(), PDO::PARAM_STR);
            $statement->bindValue(':price', $bookOBJ->getPrice(), PDO::PARAM_STR);
            $statement->bindValue(':dvdID', null, PDO::PARAM_NULL);
            $statement->bindValue(':furnitureID', null, PDO::PARAM_NULL);
            $statement->bindValue(':bookID', $bookOBJ->getBookID(), PDO::PARAM_INT);

            $statement->execute();


            break;
    }

} catch (Exception $ex) {
    $info["status"] = 'error';
    $info["message"] = $ex->getMessage();
}

echo json_encode($info);