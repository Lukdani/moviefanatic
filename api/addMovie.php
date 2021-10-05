<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];

    if (!empty($data["actors"])) {
        $implodedActors = implode(',', $data["actors"]);
    }
    
    $sql = "INSERT INTO movies (movieName, movieDescription, createdDate, instructor, actors, owner, hasSequal, movieImg ) VALUES(:movieName, :movieDescription, :createdDate, :instructor, :actors, :owner, :hasSequal, :movieImg)";
    
    $bind = [
        ":movieName" => $data["movieName"], 
        ":movieDescription" => $data["movieDescription"], 
        ":createdDate" => $data["createdDate"], 
        ":instructor" => $data["instructor"], 
        ":actors" => $implodedActors, 
        ":owner" => $data["owner"],
        ":hasSequal" => $data["hasSequal"],
        ":movieImg" => $data["movieImg"]
    ];
    
$db->sql( $sql, $bind, false /* FALSE = Not a get request.*/);
}

header("Location: /moviefanatic/index.php"); // Navigate to movies page AND refresh page (so modal closes etc.);

?>