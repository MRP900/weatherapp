<?php
    function db_connect () {
        $user = "root";
        $pass = "";
        $host = "localhost";
        $dbName = "weather";
        $dsn = "mysql:host=".$host.";dbname=".$dbName;

        $db = new PDO($dsn, $user, $pass);

        return $db;
    }
?>