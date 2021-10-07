import AddMovieController from "../controllers/addMovieController.js";
import AddMovieModel from "../models/addMovieModel.js";
import AddMovieView from "../views/addMovieView.js";

const actorsSelect = document.querySelector("#actorsSelect");
const directorSelect = document.querySelector("#directorSelect");
const studioSelect = document.querySelector("#studioSelect");

const addMovieView = new AddMovieView(
  actorsSelect,
  directorSelect,
  studioSelect
);
const addMovieModel = new AddMovieModel();

new AddMovieController(addMovieModel, addMovieView);
