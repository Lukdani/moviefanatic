<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/moviefanatic/settings/init.php";

$actorsQuery = "SELECT * FROM actors";
$actors = $db->sql($actorsQuery);



?>
<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="utf-8" />

    <title>MovieFanatic</title>
    <meta name="robots" content="All" />
    <meta name="author" content="Udgiver" />
    <meta name="copyright" content="Information om copyright" />
    <?php include "./includes/dependencies.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="css/bootstrap.scss" rel="stylesheet" type="text/css" />
    <link href="css/styles.scss" rel="stylesheet" type="text/css" />
    <link href="css/movies.scss" rel="stylesheet" type="text/css" />

    <script src="https://cdn.tiny.cloud/1/ahizxth4ug3hvkg2d8fl0o9hwzcvl47nf2m6d3s8f2kf8uh9/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: ''
    });
    </script>
</head>

<body class="bg-dark text-light">

    <?php include "./includes/navbar.php"; ?>
    <div id="actors">
        <?php foreach($actors as $actor)
echo
    "<div class='infoboks'>".
        "<div class='container p-2'>".
            "<div class='row'>".
                "<div class='col-sm-4 p-2 border'> <img src='/moviefanatic/uploads/" . $actor->actPicture . "'/>" . "</div>".
                "<div class='col-sm-8 p-2 border bg-danger text-black'>".
                    "<h3 class='overskrift text-white'>" . $actor->actName. "</h3>".
                    "<br>".
                    "<h3 class='født text-white'>Født: ". $actor->actBirthday."</h3>".
                    "<h3 class='født text-white'>". $actor->actBorn. "</h3>".
                    "<br>".
                    "<h3 class='work text-white'>Karriere: " . $actor->actActive. "</h3>".
                "</div>".
            "</div>".
                "<div class='row'>".
                    "<div class='col-sm-12 p-2 border bg-black text-black id=accordionExample'>".
                            "<div class='accordion-item'>".
                                "<h2 class='accordion-header' id='headingOne'>".
                                    "<button class='accordion-button bg-black' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>".
                                            "<h2 class='text-danger'>Filmoversigt</h2>".
                                    "</button>".
                                "</h2>".
                                "<div id='collapseOne' class='accordion-collapse collapse show' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>".
                                    "<div class='accordion-body bg-black'>".
                                        "<strong>Den totale oversigt over film</strong>".
                                        "<p class='text-white'>". $actor->actWorks. "</p>".
                                    "</div>".
                                "</div>".
                            "</div>".
                    "</div>".
                "</div>".
            "</div>".
        "</div>".
    '</div>';
 ?>

</body>

</html>