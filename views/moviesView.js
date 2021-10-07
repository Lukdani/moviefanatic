import createElement from "../utils/createElement.js";
import { formatDate } from "../utils/formatDate.js";
import tryJsonParse from "../utils/tryJsonParse.js";

class MoviesView {
  constructor(containerElement) {
    this.moviesContainer = createElement("div", ["container-lg"], null);
    containerElement.appendChild(this.moviesContainer);

    this.moviesHeader = createElement("h3", ["moviesHeader", "mt-4"], null);
    this.moviesHeader.textContent = "Movies in the DB!";
    this.moviesContainer.appendChild(this.moviesHeader);

    this.nameInputGroup = createElement("div", ["form-group"], null);
    this.moviesContainer.appendChild(this.nameInputGroup);
    this.nameInputLabel = createElement("label", ["search-label", null]);
    this.nameInputLabel.setAttribute("for", "movies-name-search");
    this.nameInputLabel.textContent = "Search on name";

    this.nameInputGroup.appendChild(this.nameInputLabel);

    this.nameInput = createElement(
      "input",
      ["movies-search-input", "form-control"],
      "movies-name-search"
    );
    this.nameInput.placeholder = "Search on movie name";
    this.nameInputGroup.appendChild(this.nameInput);

    this.moviesRow = createElement("div", ["row"], null);
    this.moviesContainer.appendChild(this.moviesRow);
  }

  clearMovies() {
    this.moviesRow.innerHTML = "";
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
      `movie-${movie.movieId}`
    );

    movieContainer.appendChild(movieElement);

    const movieImg = createElement("img", ["movie-img"], null);
    movieImg.setAttribute("src", `/moviefanatic/uploads/${movie.movieImg}`);

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
      ["movie-deleteButton", "btn-dark", "btn"],
      null
    );
    deleteButton.setAttribute("data-movieid", movie.movieId);
    deleteButton.textContent = "Delete";
    movieDetails.appendChild(deleteButton);

    const detailsButton = createElement(
      "button",
      ["movie-detailsButton", "btn-secondary", "btn"],
      null
    );
    detailsButton.setAttribute("data-movieid", movie.movieId);
    detailsButton.textContent = "Details  ";
    movieDetails.appendChild(detailsButton);
  }

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

  bindDetailsButton = (callback) => {
    const detailsButton = document.querySelectorAll(".movie-detailsButton");
    detailsButton.forEach((detailsBtn) => {
      detailsBtn.addEventListener("click", (e) => {
        const movieId = e.currentTarget?.dataset?.movieid;
        if (callback && movieId) callback(movieId);
      });
    });
  };

  bindSearchName = (callback) => {
    this.nameInput.addEventListener("change", (e) => {
      if (callback) callback(e);
    });
  };
}

export default MoviesView;
