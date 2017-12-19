<?php
/**
 * Created by PhpStorm.
 * User: macbook.mike_zye
 * Date: 19.12.17
 * Time: 09:49
 */


class Connect {
    function getConn() {
        $user = '';
        $pass = '';

        $db = new PDO('', $user, $pass); //Werte eingeben, um eine Verbindung zur MySQL-Server zu ermöglichen

        return $db;
    }
}