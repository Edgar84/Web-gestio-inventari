<?php

    //Dades de conexió
    $user = "proinv";
    $pass = "12345";
    //$host = "192.168.18.55";    //Insti
    $host = "192.168.1.55";    //Casa
    $schema = "db_projecte";

    $connection = mysqli_connect($host,$user,$pass) or die ("No s'ha pogut conectar amb el servidor de la Base de dades"); 
    //Conexión amb schema seleccionat
    $db = mysqli_select_db($connection,$schema) or die ( "nnnnNo s'ha pogut conectar amb la Base de dades" );

    //Consultes
    $productsHome = "SELECT DISTINCT p.id, p.nom, p.desc, p.any, p.preu, p.tipus, p.stock, c.nom categoria FROM `productes` AS p LEFT JOIN `pertany` AS pe ON pe.id_prod = p.id LEFT JOIN `categories` AS c ON c.id = pe.id_cat ORDER BY p.nom;";
    $categories = "SELECT DISTINCT c.nom categoria FROM categories as c INNER JOIN pertany AS pe ON c.id = pe.id_cat ORDER BY nom;";
    $tipus = "SELECT DISTINCT tipus FROM productes";

    $totsProductes = mysqli_query( $connection, $productsHome ) or die ( "Hi ha algún error amb la consulta");
    $totesCategories = mysqli_query( $connection, $categories ) or die ( "Hi ha algún error amb la consulta");
    $totsTipus = mysqli_query( $connection, $tipus ) or die ( "Hi ha algún error amb la consulta");

?>