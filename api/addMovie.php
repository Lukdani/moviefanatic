<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];

    if (!empty($data["actors"])) {
        $implodedActors = implode(',', $data["actors"]);
    }

    $ratedRBool = 0;
    if ($data["ratedR"] == true)
    {
        $ratedRBool = 1;
    }
    
    $sql = "INSERT INTO movies (movieName, movieDescription, createdDate, director, actors, studio, ratedR, movieImg ) VALUES(:movieName, :movieDescription, :createdDate, :director, :actors, :studio, :ratedR, :movieImg)";
    
    $bind = [
        ":movieName" => $data["movieName"], 
        ":movieDescription" => $data["movieDescription"], 
        ":createdDate" => $data["createdDate"], 
        ":director" => $data["director"], 
        ":actors" => $implodedActors, 
        ":studio" => $data["studio"],
        ":ratedR" => $ratedRBool,
        ":movieImg" => $data["movieImg"]
    ];
    
$db->sql( $sql, $bind, false /* FALSE = Not a get request.*/);
}

header("Location: /moviefanatic/index.php"); // Navigate to movies page AND refresh page (so modal closes etc.);

?>