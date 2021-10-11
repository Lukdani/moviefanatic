<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/classes/classDB.php";

define("CONFIG_LIVE", "0"); // 0: Test enviroment || 1: Live enviroment

if(CONFIG_LIVE == 0){
    $DB_SERVER = "astelun.com.mysql:3306";
    $DB_NAME = "astelun_com_moviefanatic";
    $DB_USER = "astelun_com_moviefanatic";
    $DB_PASS = "rootitoot";
}else{
    $DB_SERVER = "";
    $DB_NAME = "";
    $DB_USER = "";
    $DB_PASS = "";
}

$db = new db($DB_SERVER, $DB_NAME, $DB_USER, $DB_PASS);
?>