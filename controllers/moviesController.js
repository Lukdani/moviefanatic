import makeRequest from "../utils/makeRequest.js";
import tryJsonParse from "../utils/tryJsonParse.js";

class MovieController {
  constructor(movieModel, movieView) {
    this.movieModel = movieModel;
    this.movieView = movieView;

    this.getMovies();
    this.movieView.bindSearchName(this.fetchMovies);
  }

  // WE NEED TO FETCH ACTORS, DIRECTORS AND STDUIOS in order to show details in the view (the movie object itself only contains the IDs);
  async getActors() {
    let result = await makeRequest("GET", "/moviefanatic/api/getActors.php");
    if (result) {
      const parsedResult = tryJsonParse(result);
      if (parsedResult) this.movieView.addActors(parsedResult);
    }
  }

  async getMovies() {
    // Calling the methods to fetch ACTORS, DIRECTORS AND STUDIOS before displaying movies;

    // FETCHING MOVIES;
    let fetchedMovies = await makeRequest(
      "GET",
      "/moviefanatic/api/getMovies.php"
    );
    this.updateMovies(fetchedMovies);
  }

  updateMovies(fetchedMovies) {
    if (fetchedMovies) {
      this.movieView.clearMovies();
      const parsedResult = JSON.parse(fetchedMovies); // Parsing movies to JSON;
      this.movieModel.addMovies(parsedResult);

      parsedResult.forEach(async (element) => {
        //const actorsArray = element.movieActors?.split(","); // Splitting string with actors into array with actor items;
        // Adding parsed actors array on movie object before displaying;
        this.movieView.addMovie(element);
      });

      // SETTING DELETE BUTTON ON EACH MOVIE ELEMENT;
      this.movieView.bindDeleteButton(this.handleDeleteMovie);
      this.movieView.bindDetailsButton(this.handleMovieDetails);
    }
  }

  async addMovie(movie) {
    let result = await makeRequest(
      "POST",
      `/moviefanatic/api/addMovie.php?movie=${JSON.stringify(movie)}"`,
      true
    );
    this.movieView.clearMovies();
    await this.getMovies();

    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  }

  async deleteMovie(movieId) {
    let result = await makeRequest(
      "DELETE",
      `/moviefanatic/api/deleteMovie.php?movieId=${movieId}"`,
      true
    );
    this.movieView.clearMovies(); // Clearing movies from the view, it's empty before fetching and displaying movies again;
    await this.getMovies(); // Fetching movies (now without the deleted one) and displaying them in the UI;
  }

  fetchMovies = async (e) => {
    const value = e.currentTarget?.value;
    if (value) {
      let result = await makeRequest(
        "GET",
        `/moviefanatic/api/getMovies.php?movieName=${value}`,
        false
      );
      if (result) this.updateMovies(result);
    } else if (!value) {
      let result = await makeRequest(
        "GET",
        `/moviefanatic/api/getMovies.php`,
        false
      );
      if (result) this.updateMovies(result);
    }
  };

  handleDeleteMovie = async (movieId) => {
    this.deleteMovie(movieId);
  };

  handleMovieDetails = async (movieId) => {
    if (movieId) {
      window.location.href = `/moviefanatic/movie.php?movieId=${movieId}`;
    }
  };
}

export default MovieController;
