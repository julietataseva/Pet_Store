<?php

function setQuantityInCart()
{
    if (isset($_POST['setQuantity']) && isset($_SESSION['cart'])) {
        if ($_GET['action'] == 'setQuantity') {
            $count = count($_SESSION['cart']);
            for ($i = 0; $i < $count ; $i++) {
                if ($_POST["product_name"] == $_SESSION['cart'][$i]['product_name']) {
                    if ($_POST['quantity'] == 0) {
                        array_splice($_SESSION['cart'], $i, 1);
                        break;
                    } else {
                        $_SESSION['cart'][$i]['quantity'] = $_POST['quantity'];
                    }
                }
            }
        }
    }
}