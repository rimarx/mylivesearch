<?php
$host = '';
$dbname = '';
$dbuser = '';
$pass = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
$opt = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
$pdo = new PDO($dsn, $dbuser, $pass, $opt);