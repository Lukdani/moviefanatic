<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

$movieId = number_format($_REQUEST["movieId"]);

$deleteQuery = "DELETE FROM movies WHERE movieId=:movieId";
$bind = [":movieId" => $movieId];

$db->sql($deleteQuery, $bind, false);

echo "deleted";

?>