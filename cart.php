<?php

session_start();

require_once("./php/CreateDb.php");
require_once("./php/component.php");
require_once("./php/removeFromCart.php");
require_once("./php/addToCart.php");
require_once("./php/setQuantityInCart.php");

$db = new CreateDb();

addToCart();
removeFromCart();
removeAllFromCart();
setQuantityInCart();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Количка</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

    <?php require_once('./php/header.php'); ?>

    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <hr>

                <?php

                $total = 0;
                if (isset($_SESSION['cart'])) {
                    $product_name = array_column($_SESSION['cart'], 'product_name');
                    $quantity = array_column($_SESSION['cart'], 'quantity');
                    $total += getTotal($db->getData($db->catFoodTable), $product_name, $quantity);
                    $total += getTotal($db->getData($db->catAccessoriesTable), $product_name, $quantity);
                    $total += getTotal($db->getData($db->dogFoodTable), $product_name, $quantity);
                    $total += getTotal($db->getData($db->dogAccessoriesTable), $product_name, $quantity);
                    $total += getTotal($db->getData($db->smallAnimalsFoodTable), $product_name, $quantity);
                    $total += getTotal($db->getData($db->smallAnimalsAccessoriesTable), $product_name, $quantity);
                } else {
                    echo "<h5>Количката е празна</h5>";
                }

                function getTotal($data, $product_name, $quantity)
                {
                    $total = 0;
                    while ($row = mysqli_fetch_assoc($data)) {
                        for ($i = 0; $i < count($product_name); $i++) {
                            if ($row['product_name'] == $product_name[$i]) {
                                cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id'], $row['product_description'], (int)$quantity[$i]);
                                $total = $total + (int)$row['product_price'] * (int)$quantity[$i];
                            }
                        }
                    }

                    return $total;
                }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            $products = 0;
                            for ($i = 0; $i < $count; $i++) {
                                $products += $_SESSION['cart'][$i]['quantity'] ?? 0;
                            }
                            echo "<h6>Цена ($products продукта)</h6>";
                        } else {
                            echo "<h6>Цена (0 продукта)</h6>";
                        }
                        ?>
                        <h6>Доставка</h6>
                        <hr>
                        <h6>Крайна цена</h6>
                    </div>
                    <div class="col-md-6">
                        <h6><?php echo $total; ?> лв</h6>
                        <h6 class="text-success">безплатна</h6>
                        <hr>
                        <h6><?php
                            echo $total;
                            ?> лв</h6>
                    </div>
                </div>
                <form action="./makeOrder.php">
                    <button type="submit" class="btn btn-warning my-3" <?php if ($total == '0') { ?> disabled <?php   } ?>>Поръчай</button>
                </form>
            </div>

        </div>
    </div>

    <?php require_once("./php/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>