<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/classes/classDB.php";

define("CONFIG_LIVE", "0"); // 0: Test enviroment || 1: Live enviroment

if(CONFIG_LIVE == 0){
    $DB_SERVER = "localhost";
    $DB_NAME = "moviefanatic";
    $DB_USER = "root";
    $DB_PASS = "";
}else{
    $DB_SERVER = "";
    $DB_NAME = "";
    $DB_USER = "";
    $DB_PASS = "";
}

$db = new db($DB_SERVER, $DB_NAME, $DB_USER, $DB_PASS);
?>