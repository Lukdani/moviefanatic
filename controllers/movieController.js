import makeRequest from "../utils/makeRequest.js";

class MovieController {
  constructor(movieModel, movieView) {
    this.movieModel = movieModel;
    this.movieView = movieView;
    this.getMovies();
  }

  async getMovies() {
    let result = await makeRequest("GET", "/moviefanatic/api/getMovies.php");
    if (result) {
      const parsedResult = JSON.parse(result);

      this.movieModel.addMovies(parsedResult);
      parsedResult.forEach((element) => {
        const actorsArray = element.actors?.split(",");
        element.actors = actorsArray;
        this.movieView.addMovie(element);
      });
      this.movieView.bindDeleteButton(this.handleDeleteMovie);
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
    this.movieView.clearMovies();
    await this.getMovies();
  }

  handleDeleteMovie = async (movieId) => {
    this.deleteMovie(movieId);
  };
}

export default MovieController;
