<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

if (isset($_REQUEST["movieName"])) {
    $movieName = $_REQUEST["movieName"];
}


if (isset($_REQUEST["movieYear"])) {
    $movieYear = $_REQUEST["movieYear"];
}

if (isset($_REQUEST["movieRatedR"])) {
    $movieRatedR = $_REQUEST["movieRatedR"];
}


$binds = [];

$moviesQuery = (
    "SELECT 
    m.movieId, 
    m.movieName, 
    m.movieDescription, 
    m.movieCreatedDate,
    m.movieImg,

    group_concat(a.actName order by a.actName) movieActors,
    group_concat(d.dirName order by d.dirName) movieDirectors,
    group_concat(s.studName order by s.studName) movieStudios

    FROM movies m
    left join movie_actor on movie_actor.movieId = m.movieId
    left join actors a on a.actId = movie_actor.actId

    left join movie_director on movie_director.movieId = m.movieId
    left join directors d on d.dirId = movie_director.dirId

    left join movie_studio on movie_studio.movieId = m.movieId
    left join studios s on s.studId = movie_studio.studId
    
    ");

if(!empty($movieName)) {
    $moviesQuery .= " WHERE movieName LIKE CONCAT('%', :movieName, '%')";
    $binds[":movieName"] = $movieName;
}

if(!empty($movieYear)) {
    $moviesQuery .= " WHERE year(movieCreatedDate) = ". $movieYear;
    $binds[":movieYear"] = $movieYear;
}

if(!empty($movieRatedR) && $movieRatedR == "1" || $movieRatedR == "0") {
    $moviesQuery .= " WHERE movieRatedR = " . $movieRatedR;
     $binds[":movieRatedR"] = $movieRatedR;
}



$moviesQuery .= " group by m.movieId";
$movies = $db->sql($moviesQuery, $binds);

echo json_encode($movies);

?>