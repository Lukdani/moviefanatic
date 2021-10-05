<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

$directorsQuery = "SELECT * FROM directors";
$directors = $db->sql($directorsQuery);

echo json_encode($directors);

?>