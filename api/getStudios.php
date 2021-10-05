<?php
require $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

$studiosQuery = "SELECT * from studios";
$studios = $db->sql($studiosQuery);

echo json_encode($studios);

?>