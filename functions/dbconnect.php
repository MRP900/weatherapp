<?php

    function db_connect () {
        $user = "root";
        $pass = "";
        $host = "localhost";
        $dbName = "weather";
        
        // Check if json file with db info exists if online
        if (file_exists("./db.json")) {
            $jsondata = file_get_contents("./db.json");
            $array = json_decode($jsondata,true);
            $user = $array["user"];
            $pass = $array["pass"];
            $host = $array["host"];
            $dbName = $array["dbName"];
        }
        
        $dsn = "mysql:host=".$host.";dbname=".$dbName;

        $db = new PDO($dsn, $user, $pass);

        return $db;
    }
?>