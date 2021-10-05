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

    const movieHeader = createElement("h3", ["movie-header"], null);
    movieHeader.textContent = `${movie.movieName} ${
      movie.createdDate ? `(${formatDate(movie.createdDate)})` : ""
    }`;

    movieElement.appendChild(movieHeader);

    let instructorStudioString = "";
    if (movie.instructor) {
      instructorStudioString = movie.instructor;
    }

    if (movie.owner) {
      instructorStudioString += `${
        movie.instructor ? `, ${movie.owner}` : movie.owner
      }`;
    }

    if (instructorStudioString) {
      const instructorStudioElement = createElement(
        "h4",
        ["movie-instructor"],
        null
      );
      instructorStudioElement.textContent = instructorStudioString;

      movieElement.appendChild(instructorStudioElement);
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

        movieElement.appendChild(actorsContainer);
      } catch (err) {
        console.log(err);
      }
    }

    const movieDescription = createElement("div", ["movie-description"], null);
    movieDescription.innerHTML = movie.movieDescription;
    movieElement.appendChild(movieDescription);

    if (movie.ratedR) {
      const ratedR = createElement("p", ["movie-item-ratedR"], null);
      ratedR.textContent = "18+";
      movieElement.appendChild(ratedR);
    }

    const deleteButton = createElement(
      "button",
      ["movie-deleteButton", "btn-danger", "btn"],
      null
    );
    deleteButton.setAttribute("data-id", movie.id);
    deleteButton.textContent = "Delete";
    movieElement.appendChild(deleteButton);
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
