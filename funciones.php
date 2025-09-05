<?php

function conexionDB($host, $dbname, $user, $pass) {
    try {
        return new PDO("mysql:hostname=$host;dbname=$dbname", "$user", "$pass");
    } catch (PDOException $e) {
        $e->getMessage();
    }
}