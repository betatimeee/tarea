<?php
ob_start(); // Turns on output buffering
session_start();

date_default_timezone_set("America/Sao_Paulo");

try {
    $con = new PDO("mysql:dbname=IwYDvNLMe2;host=remotemysql.com", "IwYDvNLMe2", "reuuIrPtkj");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    exit("A Conexão falhou: " . $e->getMessage());
}
?>