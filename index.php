<?php

session_start();

require_once('./php/CreateDb.php');
require_once('./php/component.php');
require_once('./php/addToCart.php');

$database = new CreateDb();

addToCart();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Онлайн зоомагазин Пет Стор">
    <meta name="description" content="Храна, играчки, аксесоари за котки, кучета и малки домашни любимци.">
    <meta name="robots" content="all, follow">

    <title>Pet Store</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <?php require_once("./php/header.php"); ?>
    <div class="container">

        <div class="container">
            <h3>Суха храна за малки котенца и големи котки</h3>
            <div class="row text-center py-5">
                <?php
                $result = $database->getData($database->catFoodTable);
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_description']);
                }
                ?>
            </div>
        </div>

        <div class="container">

            <h3>Играчки, катерушки и аксесоари за котки</h3>
            <div class="row text-center py-5">
                <?php
                $result = $database->getData($database->catAccessoriesTable);
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_description']);
                }
                ?>
            </div>
        </div>

        <div class="container">

            <h3>Суха храна за малки кученца и големи кучета</h3>
            <div class="row text-center py-5">
                <?php
                $result = $database->getData($database->dogFoodTable);
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_description']);
                }
                ?>
            </div>
        </div>

        <div class="container">

            <h3>Играчки, нашийници и аксесоари за кучета</h3>
            <div class="row text-center py-5">
                <?php
                $result = $database->getData($database->dogAccessoriesTable);
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_description']);
                }
                ?>
            </div>
        </div>


        <div class="container">

            <h3>Храна за гризачи и птици</h3>
            <div class="row text-center py-5">
                <?php
                $result = $database->getData($database->smallAnimalsFoodTable);
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_description']);
                }
                ?>
            </div>
        </div>


        <div class="container">

            <h3>Клетки за гризачи, кафези за птици и аксесоари за малки животни</h3>
            <div class="row text-center py-5">
                <?php
                $result = $database->getData($database->smallAnimalsAccessoriesTable);
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_description']);
                }
                ?>
            </div>
        </div>

    </div>
    <?php require_once("./php/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>