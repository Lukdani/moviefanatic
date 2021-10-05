class AddMovieModel {
  constructor() {
    this.data = { actors: [], directors: [], studios: [] };
  }

  getActors = () => {
    return this.data.actors;
  };

  getDirectors = () => {
    return this.data.directors;
  };

  getStudios = () => {
    return this.data.studios;
  };
}

export default AddMovieModel;
