import MovieController from "../controllers/moviesController.js";
import MovieModel from "../models/moviesModel.js";
import MovieListView from "../views/moviesView.js";

const movieRoot = document.querySelector("#movies");
const movieModel = new MovieModel();
const movieView = new MovieListView(movieRoot);

new MovieController(movieModel, movieView);
