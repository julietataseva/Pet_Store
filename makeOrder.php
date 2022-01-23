<?php

session_start();

require_once('./php/CreateDb.php');
require_once('./php/component.php');
require_once('./php/order.php');

$database = new CreateDb();

order();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Данни за поръчка</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>


<body class="bg-light">

    <?php require_once('./php/header.php'); ?>

    <div class="container-fluid contact-page-div">
        <h1 class="text-center">Моля въведете данни за доставка</h1>

        <div class="col-md-12 col-sm-12 col-12">
            <div class="card h-300">
                <form method="post">

                    <div class="card-body">
                        <div class="row gutters" id="fields">

                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="firstName">
                                        <h6 class="text-primary">Име</h6>
                                    </label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="lastName">
                                        <h6 class="text-primary">Фамилия</h6>
                                    </label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>

                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="mobilePhone">
                                        <h6 class="text-primary">Телефон за връзка</h6>
                                    </label>
                                    <input type="text" class="form-control" id="mobilePhone" name="mobilePhone" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="address">
                                        <h6 class="text-primary">Адрес за доставка</h6>
                                    </label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">
                                        <h6 class="text-primary">Имейл</h6>
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-warning my-3" name="order">Поръчай</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>

    <?php require_once("./php/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>