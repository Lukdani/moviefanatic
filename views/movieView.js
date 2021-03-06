import createElement from "../utils/createElement.js";

class MovieView {
  constructor(movieContainer) {
    this.movieContainer = movieContainer;
  }

  showMovie = (movie) => {
    const movieElement = createElement(
      "div",
      ["movie-item"],
      `movie-${movie.movieId}`
    );

    this.movieContainer.appendChild(movieElement);

    const movieImg = createElement("img", ["movie-img"], null);
    movieImg.setAttribute("src", `/moviefanatic/uploads/${movie.movieImg}`);

    movieElement.appendChild(movieImg);

    const movieDetails = createElement("div", ["movie-details"], null);
    movieElement.appendChild(movieDetails);

    const movieHeader = createElement("h3", ["movie-header"], null);
    movieHeader.textContent = `${movie.movieName} ${
      movie.createdDate ? `(${formatDate(movie.createdDate)})` : ""
    }`;

    movieDetails.appendChild(movieHeader);

    let directorStudioString = "";
    if (movie.movieDirectors) {
      const parsedDirectors = movie.movieDirectors?.split(",");
      directorStudioString = parsedDirectors[0];
    }

    if (movie.movieStudios) {
      const parsedStudios = movie.movieStudios?.split(",");
      const studioName = parsedStudios[0];
      directorStudioString += `${
        movie.movieDirectors ? `, ${studioName}` : studioName
      }`;
    }

    if (directorStudioString) {
      const instructorStudioElement = createElement(
        "h4",
        ["movie-instructor"],
        null
      );
      instructorStudioElement.textContent = directorStudioString;

      movieDetails.appendChild(instructorStudioElement);
    }

    if (movie.movieActors) {
      try {
        const actorsContainer = createElement(
          "div",
          ["actors-container"],
          null
        );
        const parsedActors = movie.movieActors.split(",");
        parsedActors?.forEach((actorItem) => {
          const actorElement = createElement("span", ["actor-item"], null);
          actorElement.innerHTML = actorItem;
          actorsContainer.appendChild(actorElement);
        });

        movieDetails.appendChild(actorsContainer);
      } catch (err) {
        console.log(err);
      }
    }

    const movieDescription = createElement("div", ["movie-description"], null);
    movieDescription.innerHTML = movie.movieDescription;
    movieDetails.appendChild(movieDescription);

    if (movie.movieRatedR) {
      const ratedR = createElement("p", ["movie-item-ratedR"], null);
      ratedR.textContent = "18+";
      movieDetails.appendChild(ratedR);
    }

    const deleteButton = createElement(
      "button",
      ["movie-deleteButton", "btn-danger", "btn"],
      null
    );
    deleteButton.setAttribute("data-movieid", movie.movieId);
    deleteButton.textContent = "Delete";
    movieDetails.appendChild(deleteButton);
  };

  bindDeleteButton = (callback) => {
    const deleteButtons = document.querySelectorAll(".movie-deleteButton");
    deleteButtons.forEach((deleteBtn) => {
      deleteBtn.addEventListener("click", (e) => {
        const movieId = e.currentTarget?.dataset?.movieid;
        console.log(movieId);
        if (callback && movieId) callback(movieId);
      });
    });
  };
}

export default MovieView;
