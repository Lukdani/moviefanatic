<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

$moviesQuery = "SELECT * FROM movies";
$movies = $db->sql($moviesQuery);

/*
function deleteMovie($id) {
global $db;
$deleteQuery = "DELETE FROM movies WHERE id =" . $id;
$db->sql($deleteQuery);
}
*/

echo json_encode($movies);

?>