<?php

function component($productname, $productprice, $productimg, $productid, $productdescription)
{
    $element = "

    <div class=\"col-md-3 col-sm-6\">
                <form method=\"post\">
                    <div class=\"card shadow fixed-card\">
                        <div>
                            <img src=\"$productimg\" alt=\"$productname $productdescription\" class=\"img-fluid card-img-top\ usemap=\"#workmap\"\">
                            <map name=\"workmap\">
                                <area shape=\"rect\" coords=\"1, 1, 400, 400\" alt=\"$productname\" href=\"./$productname\" title=\"$productname\">
                            </map>
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>

                            <h6 class=\"card-title\">$productdescription</h6>

                            <h5>
                                <span class=\"price\">$productprice лв</span>
                            </h5>
                        </div>
                        <div>
                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Добави в количката<i class=\"fas fa-shopping-cart\"></i></button>
                            <input type='hidden' name='product_name' value='$productname'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid, $productdescription, $quantity = 0)
{
    $element = "
    <div class=\"border rounded\">
        <div class=\"row bg-white\">
            <div class=\"col-md-3 pl-0\">
                <img src=$productimg alt=\"$productname $productdescription\" class=\"img-fluid\" usemap=\"#workmap\"\">
                <map name=\"workmap\">
                <area shape=\"rect\" coords=\"1, 1, 400, 400\" alt=\"$productname\" href=\"./$productname\">
            </map>
            </div>
            <div class=\"col-md-6\">
                <h5 class=\"pt-2\">$productname</h5>
                <h5 class=\"pt-2\">$productprice лв</h5>
                <h5 class=\"pt-2\">Количество: $quantity</h5>
                <div class=\"flex-container\">
                    <form action=\"cart.php?action=remove&name=$productname\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"remove\">-</button>
                        <input type='hidden' name='product_name' value='$productname'>
                    </form>
                    <form action=\"cart.php?action=setQuantity&name=$productname\" method=\"post\">
                        <input type='hidden' name='product_name' value='$productname'>
                        <input type='number' name='quantity' value='$quantity' class='quantity'>
                        <button type=\"submit\" class=\"btn btn-success my-3\" name=\"setQuantity\">OK</button>
                    </form>
                    <form method=\"post\">
                        <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">+<i class=\"fas\"></i></button>
                        <input type='hidden' name='product_name' value='$productname'>
                    </form>
                    <form action=\"cart.php?action=removeAll&name=$productname\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-danger my-3\" name=\"removeAll\">Премахни</button>
                        <input type='hidden' name='product_name' value='$productname'>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    ";
    echo  $element;
}
