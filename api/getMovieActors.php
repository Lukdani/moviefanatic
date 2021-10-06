<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

$movieId = number_format($_REQUEST["movieId"]);

$movieActorsQuery = (
    "SELECT *
    FROM movie_actor
    INNER JOIN actors
    ON movie_actor.actId = $movieId
    ");

$movieActors = $db->sql($movieActorsQuery);

echo json_encode($movieActors);

?>