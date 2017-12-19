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

    $sql = 'select GemEDU, GemEVP, GemGP, GemSP, GemCVP, GemFDP, GemSVP, GemGLP, GemBDP from TGemeindeDaten where GemName = "Kreuzlingen";'; //Hier $Gemeinde einsetzen

    $arr = [];

    foreach ($dbh->query($sql) as $row) {
        $rest = 100 - $row['GemEDU'] - $row['GemEVP'] - $row['GemGP'] - $row['GemSP']- $row['GemCVP'] - $row['GemFDP'] - $row['GemSVP'] - $row['GemGLP'] - $row['GemBDP'];

        array_push($arr, ["name" => "EDU", "value" => $row['GemEDU']]);
        array_push($arr, ["name" => "EVP", "value" => $row['GemEVP']]);
        array_push($arr, ["name" => "GP", "value" => $row['GemGP']]);
        array_push($arr, ["name" => "SP", "value" => $row['GemSP']]);
        array_push($arr, ["name" => "CVP", "value" => $row['GemCVP']]);
        array_push($arr, ["name" => "FDP", "value" => $row['GemFDP']]);
        array_push($arr, ["name" => "SVP", "value" => $row['GemSVP']]);
        array_push($arr, ["name" => "GLP", "value" => $row['GemGLP']]);
        array_push($arr, ["name" => "BDP", "value" => $row['GemBDP']]);
    }

    echo json_encode($arr);

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
