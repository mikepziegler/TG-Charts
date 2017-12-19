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
    $dbh = new PDO('mysql:host=meineidealegemeindedb.cdjsoggrjh2h.us-east-2.rds.amazonaws.com;dbname=meineidealegemeindedb', $user, $pass);

    $sql = 'SELECT Gem0b19, Gem20b39, Gem40b64, Gem65b79, Gem80p FROM TGemeindeDaten WHERE GemName = "Kreuzlingen"'; //Hier $Gemeinde einsetzen

    $arr = [];

    foreach ($dbh->query($sql) as $row) {

    }

    echo json_encode($arr);

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
