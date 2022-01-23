<?php

class CreateDb
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    public $catFoodTable;
    public $catAccessoriesTable;
    public $dogFoodTable;
    public $dogAccessoriesTable;
    public $smallAnimalsFoodTable;
    public $smallAnimalsAccessoriesTable;
    public $ordersTable;
    private $connection;

    public function __construct(
        $dbname = "PetStoreDB",
        $catFoodTable = "cat_food",
        $catAccessoriesTable = "cat_accessories",
        $dogFoodTable = "dog_food",
        $dogAccessoriesTable = "dog_accessories",
        $smallAnimalsFoodTable = "small_animals_food",
        $smallAnimalsAccessoriesTable = "small_animals_accessories",
        $ordersTable = "orders",
        $servername = "localhost",
        $username = "root",
        $password = ""
    ) {
        $this->dbname = $dbname;
        $this->catFoodTable = $catFoodTable;
        $this->catAccessoriesTable = $catAccessoriesTable;
        $this->dogFoodTable = $dogFoodTable;
        $this->dogAccessoriesTable = $dogAccessoriesTable;
        $this->smallAnimalsFoodTable = $smallAnimalsFoodTable;
        $this->smallAnimalsAccessoriesTable = $smallAnimalsAccessoriesTable;
        $this->ordersTable = $ordersTable;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // create connection
        $this->connection =  new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if (!$this->connection) {
            die("Connection failed : " . mysqli_connect_error());
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute queries
        if (mysqli_query($this->connection, $sql)) {

            $this->connection = mysqli_connect($servername, $username, $password, $dbname);

            $sql1 = " CREATE TABLE IF NOT EXISTS $catFoodTable
                        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        product_name VARCHAR (25) NOT NULL,
                        product_price FLOAT,
                        product_image VARCHAR (100),
                        product_description VARCHAR (100)
                        );";

            $sql2 = " CREATE TABLE IF NOT EXISTS $catAccessoriesTable
                        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        product_name VARCHAR (25) NOT NULL,
                        product_price FLOAT,
                        product_image VARCHAR (100),
                        product_description VARCHAR (100)
                        );";

            $sql3 = "  CREATE TABLE IF NOT EXISTS $dogFoodTable
                        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        product_name VARCHAR (25) NOT NULL,
                        product_price FLOAT,
                        product_image VARCHAR (100),
                        product_description VARCHAR (100)
                        );";

            $sql4 = " CREATE TABLE IF NOT EXISTS $dogAccessoriesTable
                        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        product_name VARCHAR (25) NOT NULL,
                        product_price FLOAT,
                        product_image VARCHAR (100),
                        product_description VARCHAR (100)
                        );";

            $sql5 = " CREATE TABLE IF NOT EXISTS $smallAnimalsFoodTable
                        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        product_name VARCHAR (25) NOT NULL,
                        product_price FLOAT,
                        product_image VARCHAR (100),
                        product_description VARCHAR (100)
                        );";

            $sql6 = " CREATE TABLE IF NOT EXISTS $smallAnimalsAccessoriesTable
                        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        product_name VARCHAR (25) NOT NULL,
                        product_price FLOAT,
                        product_image VARCHAR (100),
                        product_description VARCHAR (100)
                        );";

            $sql7 = " CREATE TABLE IF NOT EXISTS $ordersTable
                        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        client_first_name VARCHAR (100),
                        client_last_name VARCHAR (100),
                        client_address VARCHAR (100),
                        client_phone VARCHAR (25) NOT NULL,
                        client_email VARCHAR (25) NOT NULL,
                        price FLOAT,
                        products_names VARCHAR (255) NOT NULL
                        );";

            if (!mysqli_query($this->connection, $sql1)) {
                echo "Error creating table : " . mysqli_error($this->connection);
            }

            if (!mysqli_query($this->connection, $sql2)) {
                echo "Error creating table : " . mysqli_error($this->connection);
            }

            if (!mysqli_query($this->connection, $sql3)) {
                echo "Error creating table : " . mysqli_error($this->connection);
            }

            if (!mysqli_query($this->connection, $sql4)) {
                echo "Error creating table : " . mysqli_error($this->connection);
            }

            if (!mysqli_query($this->connection, $sql5)) {
                echo "Error creating table : " . mysqli_error($this->connection);
            }

            if (!mysqli_query($this->connection, $sql6)) {
                echo "Error creating table : " . mysqli_error($this->connection);
            }

            if (!mysqli_query($this->connection, $sql7)) {
                echo "Error creating table : " . mysqli_error($this->connection);
            }
        } else {
            return false;
        }
    }

    public function getData($tablename)
    {
        $sql = "SELECT * FROM $tablename";

        $result = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    public function insertIntoOrdersTable($client_first_name, $client_last_name, $client_address, $client_phone, $client_email, $price, $products_names)
    {
        $query = "INSERT INTO $this->ordersTable (client_first_name, client_last_name, client_address, client_phone, client_email, price, products_names) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $statement =  $this->connection->prepare($query);
        $statement->bind_param("sssssss", $client_first_name, $client_last_name, $client_address, $client_phone, $client_email, $price, $products_names);
        $statement->execute();
    }
}
