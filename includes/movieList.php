<?php 
require_once "./settings/init.php";

$moviesQuery = "SELECT * FROM movies";
$movies = $db->sql($moviesQuery);

function deleteMovie($id) {
global $db;
$deleteQuery = "DELETE FROM movies WHERE id =" . $id;
$db->sql($deleteQuery);
}

?>

<div>

    <div class="container-lg">
        <h1 class="text-white">Movies</h1>

        <div id="movies" class="row"></div>
    </div>
    <script type="text/javascript">
    const addMovie = (movie) => {

        const movieContainer = createElement(
            "div",
            ["movieList-item-container", "col-12", "col-md-4"],
            `movie-${movie.id}`
        );

        const movieElement = createElement(
            "div",
            ["movieList-item"],
            `movie-${movie.id}`
        );
        movieContainer.appendChild(movieElement);

        const movieHeader = createElement("h3", ["movie-header"], null);
        movieHeader.textContent = movie.movieName;

        movieElement.appendChild(movieHeader);


        const movieDescription = createElement("div", ["movie-description"], null);
        movieDescription.textContent = movie.movieDescription;
        movieElement.appendChild(movieDescription);

        document.querySelector("#movies").appendChild(movieContainer);

        const deleteButton = createElement("button", ["movie-deleteButton", "btn-danger", "btn"], null);
        deleteButton.textContent = "Delete";
        <?php
        global $deleteMovie;
        echo "deleteButton.addEventListener('click', () => {
            $deleteMovie(movie.id);
        })"
        ?>;
        movieElement.appendChild(deleteButton);

    }

    const createElement = (tag, classes, id) => {
        const element = document.createElement(tag);
        if (classes)
            classes.forEach((classElement) => {
                element.classList.add(classElement);
            });
        if (id) element.setAttribute("id", id);

        return element;
    }


    const movies = <?php echo json_encode($movies) ?>;
    movies.forEach(movie => {
        addMovie(movie);
    })
    </script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</div>