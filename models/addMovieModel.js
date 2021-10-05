class AddMovieModel {
  constructor() {
    this.data = { actors: [], directors: [] };
  }

  getActors = () => {
    return this.data.actors;
  };

  getDirectors = () => {
    return this.data.directors;
  };
}

export default AddMovieModel;
