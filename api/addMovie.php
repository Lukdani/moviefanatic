<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $file = $_FILES;

$movieImg = $file["movieImg"]["tmp_name"];

if (!empty($movieImg)) {
    move_uploaded_file($movieImg, $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/uploads/" . basename($file["movieImg"]["name"]));
}

    if (!empty($data["movieActors"])) {
        $implodedActors = implode(',', $data["movieActors"]);
    }

    $ratedRBool = 0;
    if ($data["movieRatedR"] == true)
    {
        $ratedRBool = 1;
    }
    
    $sql = "INSERT INTO movies (movieName, movieDescription, movieCreatedDate, movieRatedR, movieImg ) VALUES(:movieName, :movieDescription, :movieCreatedDate, :movieRatedR, :movieImg)";

    $bind = [
        ":movieName" => $data["movieName"], 
        ":movieDescription" => $data["movieDescription"], 
        ":movieCreatedDate" => $data["movieCreatedDate"],
        ":movieRatedR" => $ratedRBool,
        ":movieImg" => (!empty($movieImg)) ? $file["movieImg"]["name"] : NULL
    ];

$db->sql( $sql, $bind, false);

$createdMovieSql = "SELECT * FROM movies WHERE movies.movieId=(SELECT max(movies.movieId) FROM movies)";

$createdMovie= $db->sql($createdMovieSql);

foreach ($data["movieActors"] as $actor) {
    $sqlMovieActor = "INSERT INTO movie_actor (movieId, actId) VALUES(:movieId, :actId)";

    $bindActor = [
        ":movieId" =>$createdMovie[0]->movieId, 
        ":actId" => $actor["actId"],
    ];
$db->sql( $sqlMovieActor, $bindActor, false);
}

if (!empty($data["movieDirector"])) {
    $sqlMovieDirector = "INSERT INTO movie_director (movieId, dirId) VALUES(:movieId, :dirId)";

    $bindMovieDirector = [
        ":movieId" =>$createdMovie[0]->movieId, 
        ":dirId" => $data["movieDirector"],
    ];
$db->sql( $sqlMovieDirector, $bindMovieDirector, false);
}

if (!empty($data["movieStudio"])) {
    $sqlMovieStudio = "INSERT INTO movie_studio (movieId, studId) VALUES(:movieId, :studId)";

    $bindMovieStudio = [
        ":movieId" =>$createdMovie[0]->movieId, 
        ":studId" => $data["movieStudio"],
    ];
$db->sql( $sqlMovieStudio, $bindMovieStudio, false);
}

}

header("Location: /moviefanatic/index.php"); // Navigate to movies page AND refresh page (so modal closes etc.);

?>