<?php

try {

    //Host
    $host = "localhost";

    //dbname
    $dbname = "kneesundo";

    //user
    $user = "root";

    //pass
    $pass = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

define("APPURL", "http://localhost/KneesunDo");
