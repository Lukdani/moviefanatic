import createElement from "../utils/createElement.js";
import { formatDate } from "../utils/formatDate.js";

class MovieView {
  constructor(containerElement) {
    this.moviesContainer = createElement("div", ["container-lg"], null);
    containerElement.appendChild(this.moviesContainer);

    this.moviesHeader = createElement("h3", ["moviesHeader", "mt-4"], null);
    this.moviesHeader.textContent = "Movies in the DB!";

    this.moviesContainer.appendChild(this.moviesHeader);

    this.moviesRow = createElement("div", ["row"], null);
    this.moviesContainer.appendChild(this.moviesRow);
  }

  clearMovies() {
    this.moviesRow.innerHTML = "";
  }

  addActors(actors) {
    this.actors = actors;
  }

  addDirectors(directors) {
    this.directors = directors;
  }

  addStudios(studios) {
    this.studios = studios;
  }

  addMovie(movie) {
    const movieContainer = createElement(
      "div",
      ["movieList-item-container", "col-12", "col-md-4"],
      `movie-${movie.id}`
    );

    this.moviesRow.appendChild(movieContainer);

    const movieElement = createElement(
      "div",
      ["movieList-item"],
      `movie-${movie.id}`
    );

    movieContainer.appendChild(movieElement);

    const movieImg = createElement("img", ["movie-img"], null);
    movieImg.setAttribute("src", movie.movieImg);

    movieElement.appendChild(movieImg);
    movieContainer.appendChild(movieElement);

    const movieDetails = createElement("div", ["movie-details"], null);
    movieElement.appendChild(movieDetails);

    const movieHeader = createElement("h3", ["movie-header"], null);
    movieHeader.textContent = `${movie.movieName} ${
      movie.createdDate ? `(${formatDate(movie.createdDate)})` : ""
    }`;

    movieDetails.appendChild(movieHeader);

    let directorStudioString = "";
    if (movie.director) {
      const director = this.directors?.find(
        (directorItem) => directorItem.id === movie.director
      );
      directorStudioString = director?.name;
    }

    if (movie.studio) {
      const studioName = this.studios?.find(
        (studioItem) => studioItem.id === movie.studio
      )?.name;
      directorStudioString += `${
        movie.director ? `, ${studioName}` : studioName
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

    if (movie.actors) {
      try {
        const actorsContainer = createElement(
          "div",
          ["actors-container"],
          null
        );

        movie.actors?.forEach((actorItem) => {
          const actorElement = createElement("span", ["actor-item"], null);
          actorElement.innerHTML = this.actors?.find(
            (actor) => actor.id === actorItem
          ).name;
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

    if (movie.ratedR) {
      const ratedR = createElement("p", ["movie-item-ratedR"], null);
      ratedR.textContent = "18+";
      movieDetails.appendChild(ratedR);
    }

    const deleteButton = createElement(
      "button",
      ["movie-deleteButton", "btn-danger", "btn"],
      null
    );
    deleteButton.setAttribute("data-id", movie.id);
    deleteButton.textContent = "Delete";
    movieDetails.appendChild(deleteButton);
  }

  bindDeleteButton = (callback) => {
    const deleteButtons = document.querySelectorAll(".movie-deleteButton");
    deleteButtons.forEach((deleteBtn) => {
      deleteBtn.addEventListener("click", (e) => {
        const movieId = e.currentTarget?.dataset?.id;
        console.log(movieId, callback);
        if (callback && movieId) callback(movieId);
      });
    });
  };
}

export default MovieView;
