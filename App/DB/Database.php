<?php


class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '301994';
        $this->dbname = 'scandiweb';
        $this->charset = 'utf8mb4';

        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

}

/*
 -- Create database `scandiweb`;
-- drop database scandiweb;

Create table dvd(
ID int primary key auto_increment,
sizeMB float not null
);

create table furniture(
ID int primary key auto_increment,
height float not null,
width float not null,
length float not null
);

create table book(
ID int primary key auto_increment,
weightKG float not null
);

CREATE TABLE product (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    SKU VARCHAR(255) NOT NULL,
    productName VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    dvdID INT,
    furnitureID INT,
    bookID INT,
    CONSTRAINT FK_product_dvd FOREIGN KEY (dvdID)
        REFERENCES dvd (ID),
    CONSTRAINT FK_product_furniture FOREIGN KEY (furnitureID)
        REFERENCES furniture (ID),
    CONSTRAINT FK_product_book FOREIGN KEY (bookID)
        REFERENCES book (ID)
);

*/