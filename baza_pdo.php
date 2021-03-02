<?php
try
{   
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
    $dbh = new PDO("mysql:host=localhost;dbname=ozgacms", "root", "", $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    echo 'Połączenie z bazą nie powiodło sie: ' . $e->getMessage();
}







?>