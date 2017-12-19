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

$type = $_POST['type'];
switch($type) {
    case "population":

        try {
            $dbh = $class->getConn();

            $sql = 'SELECT GemBevoelkerung from TGemeindeDaten WHERE GemName = "Kreuzlingen"';//Hier $Gemeinde einsetzen

            $arr = [];

            foreach ($dbh->query($sql) as $row) {
                array_push($arr, ["Population" => $row['GemBevoelkerung']]);
            }

            echo json_encode($arr);

            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        break;

    case "Partei":

        try {
            $arr = [];
            $dbh = $class->getConn();
            $sql = 'select GemEDU, GemEVP, GemGP, GemSP, GemCVP, GemFDP, GemSVP, GemGLP, GemBDP from TGemeindeDaten where GemName = "Kreuzlingen";';//Hier $Gemeinde einsetzen
            foreach ($dbh->query($sql) as $row) {


                $oldr = 0;
                foreach($row as $r) {
                    if ($oldr < $r) {
                        $oldr = $r;
                    }
                }

                if ($row['GemEDU'] == $oldr) {
                    $str = "EDU";
                }
                if ($row['GemEVP'] == $oldr) {
                    $str = "EVP";
                }
                if ($row['GemGP'] == $oldr) {
                    $str = "GP";
                }
                if ($row['GemSP'] == $oldr) {
                    $str = "SP";
                }
                if ($row['GemCVP'] == $oldr) {
                    $str = "CVP";
                }
                if ($row['GemFDP'] == $oldr) {
                    $str = "FDP";
                }
                if ($row['GemSVP'] == $oldr) {
                    $str = "SVP";
                }
                if ($row['GemGLP'] == $oldr) {
                    $str = "GLP";
                }
                if ($row['GemBDP'] == $oldr) {
                    $str = "BDP";
                }

                array_push($arr, ['Partei' => $str, 'Pro' => $oldr]);
            }

            echo json_encode($arr);

            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        break;
}





