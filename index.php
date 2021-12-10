<?php
    require 'conect.php';
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecte</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');</style>
    <link rel="stylesheet" href="src/css/bootstrap-5.1.3/bootstrap.min.css"/>
    <link rel="stylesheet" href="src/css/style.css"/>
</head>
<body>
    <header>
        <div class="container margin-bottom_16">
            <div class="bg-primary">
                <h1>Hello</h1>
            </div>
        </div>
    </header>
    <div class="container margin-bottom_16 search-content">
        <form>
            <div>
                <input type="text" class="form-control" id="search" placeholder="Busca un producte">
            </div>
        </form>
    </div>
    <div class="container">
        <section class="table table-responsive">
            <?php 
                // $consulta = "SELECT * FROM `productes`";
                // $totsProductes = mysqli_query( $connection, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                echo "<table class='table'>";
                echo "<thead class='table-head'>";
                echo "<tr>";
                echo "<th class='order-0'>Id</th>";
                echo "<th class='order-1'>Nom</th>";
                echo "<th class='order-2'>Tipus</th>";
                echo "<th class='order-3'>Preu</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody class='table-body'>";
                while ($columna = mysqli_fetch_array($totsProductes)){
                    echo "<tr>";
                    echo "<td class='order-0 cell-w-100'><span class='aria-label'>Id</span>" . $columna['id'] . "</td><td class='order-1 cell-w-100'><span class='aria-label'>Nom</span>" . $columna['nom'] . "</td><td class='order-2 cell-w-100'><span class='aria-label'>Tipus</span>" . $columna['tipus'] . "</td><td class='order-3 cell-w-100'><span class='aria-label'>Preu</span>" . $columna['preu'] . "€ </td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            ?>
        </section>
        <section class="grid grid-products">
            <div class="row">
                <?php
                while ($columna = mysqli_fetch_array($totsProductes)){
                    echo "
                        <div class='col-6 col-md-3'>
                            <div class='product'>
                                <div class='images'>
                                    <figure><img src='src/img/products/" .$columna['id']. ".jpg' alt=" . $columna['nom'] . "></figure>
                                </div>
                                <div class='product-info'>
                                    <div class='product-info-tittle'>
                                        <h2>" . $columna['nom'] . "</h2>
                                    </div>
                                    <div class='product-desc'>
                                        <p class='tipus'>" . $columna['tipus'] . "</p>
                                        <p class='price'><span>" . $columna['preu'] . "</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </section>
    </div>
    <script src="src/js/functions.js"></script>
</body>
</html>
