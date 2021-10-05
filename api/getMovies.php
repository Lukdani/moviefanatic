<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

$moviesQuery = "SELECT * FROM movies";
$movies = $db->sql($moviesQuery);

echo json_encode($movies);

?>