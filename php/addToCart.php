<?php

function addToCart()
{
    if (isset($_POST['add'])) {
        if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);

            $item_array = array(
                'product_name' => $_POST['product_name']
            );

            $exists = false;
            for ($i = 0; $i < $count; $i++) {
                if ($_SESSION['cart'][$i]['product_name'] == $_POST['product_name']) {
                    $quantity = $_SESSION['cart'][$i]['quantity'] + 1;
                    $_SESSION['cart'][$i] = $item_array;
                    $_SESSION['cart'][$i]['quantity'] = $quantity;
                    $exists = true;
                    break;
                }
            }
            if (!$exists) {
                $_SESSION['cart'][$count] = $item_array;
                $_SESSION['cart'][$count]['quantity'] = 1;
            }
        } else {

            $item_array = array(
                'product_name' => $_POST['product_name']
            );

            // Create new session variable
            $_SESSION['cart'][0] = $item_array;
            $_SESSION['cart'][0]['quantity'] = 1;
        }
    }
}

?>