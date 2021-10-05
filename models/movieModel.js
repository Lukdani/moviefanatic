class MovieModel {
  constructor() {
    this.movies = [];
    this.movieCount = 0;
  }

  addMovie(movie) {
    this.movies = [...this.movies, movie];
    this.movieCount = this.movies?.length;
  }

  addMovies(movies) {
    this.movies = [...movies];
  }

  getMovies() {
    return this.movies;
  }

  getmovieCount() {
    return this.movieCount;
  }

  getMovie(id) {
    return this.movies.find((movieItem) => movieItem.id === id);
  }
}

export default MovieModel;
