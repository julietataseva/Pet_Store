<?php

function removeFromCart()
{
    if (isset($_POST['remove'])) {
        if ($_GET['action'] == 'remove') {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value["product_name"] == $_POST['product_name']) {
                    if ($_SESSION['cart'][$key]['quantity'] == 1) {
                        array_splice($_SESSION['cart'], $key, 1);
                        break;
                    } else {
                        $_SESSION['cart'][$key]['quantity']--;
                    }
                }
            }
        }
    }
}

function removeAllFromCart()
{
    if (isset($_POST['removeAll'])) {
        if ($_GET['action'] == 'removeAll') {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value["product_name"] == $_POST['product_name']) {
                    array_splice($_SESSION['cart'], $key, 1);
                    break;
                }
            }
        }
    }
}
