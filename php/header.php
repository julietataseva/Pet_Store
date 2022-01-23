<?php

require_once("./php/CreateDb.php");

$db = new CreateDb();

?>

<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand" title="Начало Онлайн магазин за домашни любимци">
            <h3 class="px-5">
                <i class="fas fa-home"></i> Начало
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="dropdown">
            <a href="./cats.php" class="navbar-brand" title="Храна, играчки, катерушки и аксесоари за котки">
                <h3 class="px-5">
                    <i class="fas fa-cat"></i> Котки
                </h3>
            </a>
            <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown-content">
            <a href="catFood.php">Храна</a>
            <a href="catAccessories.php">Аксесоари</a>
            </div>
        </div> 

        <div class="dropdown">
            <a href="./dogs.php" class="navbar-brand" title="Храна, играчки, нашииници и аксесоари за кучета">
                <h3 class="px-5">
                    <i class="fas fa-dog"></i> Кучета
                </h3>
            </a>
            <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown-content">
            <a href="dogFood.php">Храна</a>
            <a href="dogAccessories.php">Аксесоари</a>
            </div>
        </div> 

        <div class="dropdown">
            <a href="./smallAnimals.php" class="navbar-brand" title="Храна и аксесоари за малки животни">
                <h3 class="px-5">
                    <i class="fas fa-kiwi-bird"></i> Малки животни
                </h3>
            </a>
            <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown-content">
            <a href="smallAnimalsFood.php">Храна</a>
            <a href="smallAnimalsAccessories.php">Аксесоари</a>
            </div>
        </div> 

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active" title="Онлайн зоомагазин Пет Стор - Количка">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Количка
                        <?php

                        if (isset($_SESSION['cart'])) {
                            $total = 0;
                            $quantity = array_column($_SESSION['cart'], 'quantity');
                            for ($i = 0; $i < count($quantity); $i++) {
                                $total += $quantity[$i];
                            }
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$total</span>";
                        } else {
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>
