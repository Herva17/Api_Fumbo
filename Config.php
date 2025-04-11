<?php
function get_connection()
{
    $host = "localhost";
    $username = "root";
    $dbname = "bibliotheque_db";
    $pass = "";
    $pdo = null;
    try {
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . '', $username, $pass);
        return $pdo;
    }
     catch (Exception $e) {
        echo $e->getMessage();
    }
}
