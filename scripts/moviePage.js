import MovieController from "../controllers/movieController.js";
import MovieModel from "../models/moviesModel.js";
import MovieView from "../views/movieView.js";

const movieRoot = document.querySelector("#movie");
const movieModel = new MovieModel();
const movieView = new MovieView(movieRoot);

new MovieController(movieModel, movieView);
