<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

$actorsQuery = "SELECT * FROM actors";
$actors = $db->sql($actorsQuery);

echo json_encode($actors);

?>