import { formatDate } from "../utils/formatDate.js";

class MovieView {
  constructor(containerElement) {
    this.moviesContainer = this.createElement("div", ["container-lg"], null);
    containerElement.appendChild(this.moviesContainer);

    this.moviesHeader = this.createElement(
      "h3",
      ["moviesHeader", "mt-4"],
      null
    );
    this.moviesHeader.textContent = "Movies in the DB!";

    this.moviesContainer.appendChild(this.moviesHeader);

    this.moviesRow = this.createElement("div", ["row"], null);
    this.moviesContainer.appendChild(this.moviesRow);
  }

  clearMovies() {
    this.moviesRow.innerHTML = "";
  }

  addMovie(movie) {
    const movieContainer = this.createElement(
      "div",
      ["movieList-item-container", "col-12", "col-md-4"],
      `movie-${movie.id}`
    );

    this.moviesRow.appendChild(movieContainer);

    const movieElement = this.createElement(
      "div",
      ["movieList-item"],
      `movie-${movie.id}`
    );

    movieContainer.appendChild(movieElement);

    const movieImg = this.createElement("image", ["movie-img"], null);
    movieImg.src = movie.movieImg;

    movieElement.appendChild(movieImg);
    movieContainer.appendChild(movieElement);

    const movieHeader = this.createElement("h3", ["movie-header"], null);
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
      const instructorStudioElement = this.createElement(
        "h4",
        ["movie-instructor"],
        null
      );
      instructorStudioElement.textContent = instructorStudioString;

      movieElement.appendChild(instructorStudioElement);
    }

    if (movie.actors) {
      console.log(movie.actors);
      try {
        // const parsedActors = JSON.parse(movie.actors);

        const actorsContainer = this.createElement(
          "div",
          ["actors-container"],
          null
        );

        movie.actors?.forEach((actorItem) => {
          const actorElement = this.createElement("span", ["actor-item"], null);
          actorElement.innerHTML = actorItem;
          actorsContainer.appendChild(actorElement);
        });

        movieElement.appendChild(actorsContainer);
      } catch (err) {
        console.log(err);
      }
    }

    const movieDescription = this.createElement(
      "div",
      ["movie-description"],
      null
    );
    movieDescription.innerHTML = movie.movieDescription;
    movieElement.appendChild(movieDescription);

    const deleteButton = this.createElement(
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

  createElement(tag, classes, id) {
    const element = document.createElement(tag);
    if (classes)
      classes.forEach((classElement) => {
        element.classList.add(classElement);
      });
    if (id) element.setAttribute("id", id);

    return element;
  }
}

export default MovieView;
