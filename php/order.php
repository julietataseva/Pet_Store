<?php

require_once('./php/CreateDb.php');

function order()
{
    $database = new CreateDb();

    if (isset($_POST['order'])) {
        $products_names = '';
        foreach ($_SESSION['cart'] as $key => $value) {
            $products_names = $products_names . $value["product_name"] ." - ".$_SESSION['cart'][$key]["quantity"]. ", ";
        }

        $total = 0;
        if (isset($_SESSION['cart'])) {
            $product_name = array_column($_SESSION['cart'], 'product_name');
            $quantity = array_column($_SESSION['cart'], 'quantity');
            $total += getTotal($database->getData($database->catFoodTable), $product_name, $quantity);
            $total += getTotal($database->getData($database->catAccessoriesTable), $product_name, $quantity);
            $total += getTotal($database->getData($database->dogFoodTable), $product_name, $quantity);
            $total += getTotal($database->getData($database->dogAccessoriesTable), $product_name, $quantity);
            $total += getTotal($database->getData($database->smallAnimalsFoodTable), $product_name, $quantity);
            $total += getTotal($database->getData($database->smallAnimalsAccessoriesTable), $product_name, $quantity);
        }

        $database->insertIntoOrdersTable($_POST['firstName'], $_POST['lastName'], $_POST['address'], $_POST['mobilePhone'], $_POST['email'], $total, $products_names);

        foreach ($_SESSION['cart'] as $key => $value) {
            unset($_SESSION['cart'][$key]);
            echo "<script>window.location = 'successfulOrder.php'</script>";
        }
    }
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
