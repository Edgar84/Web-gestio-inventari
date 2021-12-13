<?php
    require 'conect.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top DVD</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');</style>
    <link rel="stylesheet" href="src/css/bootstrap-5.1.3/bootstrap.min.css"/>
    <link rel="stylesheet" href="src/css/style.css"/>
</head>
<body>
    <div class="wrapper">
        
        <!--Cabecera-->
        <div class="container">
            <header class="top-bar">
                <div class="empty"></div>
                <div class="page-title">
                    <a href="main.php" title="Top DVD"></a>
                </div>
                <div>
                    <a href="#" id="bMenu">&#9776</a>
                </div>
            </header>
        </div>
        <!--Menu off canvas-->
        <div id="menuLat">
            <header>
                <div class="menuHeader">
                    <p>Selecciona una categoría</p>
                </div>
            </header>
            <nav class="list-menu">
                <ul>
                    <?php
                        while ($categoryList = mysqli_fetch_array($totesCategories)){
                            echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='#'>" . $categoryList['categoria'] . "</a>
                                </li>
                            ";
                        }
                    ?>
                </ul>
            </nav>
        </div>
        <div id="dark"></div>
        <!--Contenido-->
        <div class="container">
            <div class="content">
                <!--Filtros-->

                <section class="filters-block">
                    <div class="left">
                    </div>
                    <div class="right">
                        <div class="form-group">
                            <select class="form-control" id="tipus">
                                <option value="">Tipus</option>
                                <?php
                                    while ($tipusProduct = mysqli_fetch_array($totsTipus)){
                                        echo "
                                            <option value='" . $tipusProduct['tipus'] . "'>"
                                            . $tipusProduct['tipus'] . 
                                            "</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </section>

                <section class="main-section">
                    <section class="products-grid-view">
                        <div class="row-grid">
                            <?php
                            while ($products = mysqli_fetch_array($totsProductes)){
                                $img = $products['id'] <= 135 ? $products['id'] : "00";
                                echo "
                                    <!--<div>-->
                                        <div class='product product--not-selected'>
                                            <div class='image'>
                                                <figure><img src='src/img/products/" . $img . ".jpg' alt=" . $products['nom'] . "></figure>
                                            </div>
                                            <div class='product-info'>
                                                <div class='product-info-tittle'>
                                                    <h2 title='" . $products['nom'] . "'>" . $products['nom'] . "</h2>
                                                </div>
                                                <div class='product-desc'>
                                                    <p class='any'>(" . $products['any'] . ")</p>
                                                    <p class='tipus'>" . $products['tipus'] . "</p>
                                                    <p class='stock'>" . $products['stock'] . " unitats</p>
                                                    <p class='price'>" . $products['preu'] . "<span>€</span></p>
                                                    <p class='category'>" . $products['categoria'] . "</p>
                                                </div>
                                            </div>
                                        </div>
                                    <!--</div>-->";
                                }
                            ?>
                            <div class="alert">
                                <p>No hem trobat filtres per la opció selecionada</p>
                            </div>
                        </div>
                    </section>
                </section>

            </div>
        </div>
        <!--Footer-->
        <footer class="footer">
            <div class="container">
                <p>&copy;2021-2022</p>
                <p>Edgar Capagons - CFGS 1r DAM</p>
                <p>PROJECTE 1 - Gestió d'inventari</p>
            </div>
            
        </footer>
    </div>

    <!--Scripts-->
    <script src="src/js/functions.js"></script>
</body>
</html>
