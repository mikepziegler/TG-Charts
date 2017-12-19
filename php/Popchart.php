<?php
/**
 * Created by PhpStorm.
 * User: macbook.mike_zye
 * Date: 28.11.17
 * Time: 08:33
 */
session_start();

$Gemeinde = $_SESSION['gemeinde'];
//Hier sollen beim Klick einer Gemeinde den Namen der Gemeinde weitergeschickt werden.

require("sql-conn.php");

$class = new Connect;

try {
    $dbh = $class->getConn();

    $sql = 'SELECT Gem0b19, Gem20b39, Gem40b64, Gem65b79, Gem80p FROM TGemeindeDaten WHERE GemName = "Kreuzlingen"'; //Hier $Gemeinde einsetzen

    $arr = [];

    foreach ($dbh->query($sql) as $row) {

        array_push($arr, ["name" => "0 bis 19 Jahre", "value" => $row['Gem0b19']]);
        array_push($arr, ["name" => "20 bis 39 Jahre", "value" => $row['Gem20b39']]);
        array_push($arr, ["name" => "40 bis 64 Jahre", "value" => $row['Gem40b64']]);
        array_push($arr, ["name" => "65 bis 79 Jahre", "value" => $row['Gem65b79']]);
        array_push($arr, ["name" => "älter als 80 Jahre ", "value" => $row['Gem80p']]);

    }

    echo json_encode($arr);

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
