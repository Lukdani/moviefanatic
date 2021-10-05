import MovieController from "./controllers/movieController.js";
import MovieModel from "./models/movieModel.js";
import MovieListView from "./views/movieView.js";

const movieRoot = document.querySelector("#movies");
const movieModel = new MovieModel();
const movieView = new MovieListView(movieRoot);

new MovieController(movieModel, movieView);
