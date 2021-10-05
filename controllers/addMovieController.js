import makeRequest from "../utils/makeRequest.js";
import tryJsonParse from "../utils/tryJsonParse.js";

class AddMovieController {
  constructor(addMovieModel, addMovieView) {
    this.addMovieModel = addMovieModel;
    this.addMovieView = addMovieView;
    this.updateActors();
    this.updateDirectors();
  }

  updateActors = async () => {
    const actors = await makeRequest("GET", "/moviefanatic/api/getActors.php");
    if (actors?.length > 0) {
      const parsedActors = tryJsonParse(actors); // Array from backend comes as a stringified array, so we need to parse it;
      this.addMovieModel.data.actors = parsedActors;
      this.addMovieView.populateActorOptions(parsedActors);
    }
  };

  updateDirectors = async () => {
    const directors = await makeRequest(
      "GET",
      "/moviefanatic/api/getDirectors.php"
    );
    if (directors?.length > 0) {
      const parsedDirectors = tryJsonParse(directors); // Array from backend comes as a stringified array, so we need to parse it;
      this.addMovieModel.data.directors = parsedDirectors;
      this.addMovieView.populateDirectorOptions(parsedDirectors);
    }
  };
}

export default AddMovieController;
