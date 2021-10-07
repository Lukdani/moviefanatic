import postRequest from "../utils/postRequest.js";

class MovieController {
  constructor(movieModel, movieView) {
    this.movieModel = movieModel;
    this.movieView = movieView;

    this.fetchMovie();
  }

  fetchMovie = async () => {
    const urlParams = new URLSearchParams(window.location.search);
    console.log(urlParams.get("movieId"));
    let movie;
    await postRequest("/moviefanatic/api/getMovie.php", {
      movieId: urlParams?.get("movieId"),
      password: "kimkode1234",
    })
      .then((fetchedMovie) => fetchedMovie.json())
      .then((parsedMovie) => (movie = parsedMovie));
    if (movie != null) {
      this.movieView.showMovie(movie[0]);
    }
  };
}

export default MovieController;
