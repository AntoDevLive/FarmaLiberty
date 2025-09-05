<?php

function conexionDB($host, $user, $pass) {
    try {
        return new PDO("mysql:hostname=$host;dbname=farmaliberty", "$user", "$pass");
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


