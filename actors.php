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

    <link href="./css/bootstrap.scss" rel="stylesheet" type="text/css" />
    <link href="./css/styles.scss" rel="stylesheet" type="text/css" />
    <link href="./css/movies.scss" rel="stylesheet" type="text/css" />
    <?php include "./includes/dependencies.php"; ?>
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
    <?php include "./includes/addMovie.php"; ?>
    <div id="actors">
        <?php foreach($actors as $actor)
echo
    "<div class='infoboks'>".
        "<div class='container p-2'>".
            "<div class='row'>".
                "<div class='col-sm-4 p-2 border'> <img src='/moviefanatic/uploads/" . $actor->actPicture . "'/>" . "</div>".
                "<div class='col-sm-8 p-2 border bg-primary text-black'>".
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
                                            "<h2 class='text-primary'>Filmoversigt</h2>".
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

        <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
</body>

</html>