<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=dbtc", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
