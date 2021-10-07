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
    "<div class='bg-secondary'>".
        "<div class='container'>".
            "<div class='row'>".
                "<div class='col-sm-4'> <img source='moviefanatic/uploads/" . $actor->actPicture . "'/>" . "</div>".
                "<div class='col-sm-8'>".
                    "<h3>" . $actor->actName. "</h3>".
                    "<br>".
                    "<p>". $actor->actBirthday."</p>".
                    "<br>".
                    "<p>". $actor->actBorn. "</p>".
                    "<br>".
                    "<p>" . $actor->actActive. "</p>".
                "</div>".
            "</div>".
                "<div class='row'>".
                    "<div class='col-sm-12'>".
                        "<p>". $actor->actWorks. "</p>" .
                    "</div>".
                "</div>".
            "</div>".
        "</div>".
    '</div>';
 ?>
</div>

</body>

</html>

