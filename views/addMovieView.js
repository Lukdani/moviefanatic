import createElement from "../utils/createElement.js";

class AddMovieView {
  constructor(actorsSelectElement, directorSelectElement) {
    this.actorsSelectElement = actorsSelectElement;
    this.directorSelectElement = directorSelectElement;
  }

  populateActorOptions(actors) {
    if (actors && actors.length > 0) {
      actors?.forEach((actorItem) => {
        const actorOption = createElement("option", null, null);
        actorOption.value = actorItem.id;
        actorOption.innerHTML = actorItem.name;
        this.actorsSelectElement.appendChild(actorOption);
      });
    }
  }

  populateDirectorOptions(directors) {
    if (directors && directors.length > 0) {
      directors.forEach((actorItem) => {
        const actorOption = createElement("option", null, null);
        actorOption.value = actorItem.id;
        actorOption.innerHTML = actorItem.name;
        this.directorSelectElement.appendChild(actorOption);
      });
    }
  }
}

export default AddMovieView;
