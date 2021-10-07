<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

$httpBody = json_decode(file_get_contents('php://input'), true);

$movieName = $httpBody["movieName"];
$movieId = $httpBody["movieId"];
$movieActor = $httpBodoy["movieActor"];

$password = "kimkode1234";

$sqlQuery = "SELECT * FROM movies where 1=1 ";
$bind = [];

header('Content-Type: application/json; charset=utf-8'); 

if (isset($httpBody["password"]) && $httpBody["password"] == $password) {
header('HTTP/1.1 200 OK');

    if (!empty($movieName)) {
        $sqlQuery .= " AND movieName = :movieName"; 
        $bind[":movieName"] = $movieName;
    };

    if (!empty($movieId)) {
        $sqlQuery .= " AND movieId = :movieId";
        $bind[":movieId"] = $movieId;
    }

    if (!empty($movieActor)) {
        $sqlQuery .= "WHERE CONTAINS(movieActors, :movieActors)";
        $bind[":movieActors"] = $movieActor;
    }

    $movie = $db->sql($sqlQuery, $bind);
    echo json_encode($movie);
}

else {
    header('HTTP/1.1 401 Unauthorized');
    $error["errorMessage"] = $movieId;
    echo json_encode($error);
}

?>