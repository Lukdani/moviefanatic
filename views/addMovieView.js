import createElement from "../utils/createElement.js";

class AddMovieView {
  constructor(actorsSelectElement, directorSelectElement, studioSelectElement) {
    this.actorsSelectElement = actorsSelectElement;
    this.directorSelectElement = directorSelectElement;
    this.studioSelectElement = studioSelectElement;
  }

  populateActorOptions(actors) {
    if (actors && actors.length > 0) {
      actors?.forEach((actorItem) => {
        const actorOption = createElement("option", null, null);
        actorOption.value = actorItem.actId;
        actorOption.innerHTML = actorItem.actName;
        this.actorsSelectElement.appendChild(actorOption);
      });
    }
  }

  populateDirectorOptions(directors) {
    if (directors && directors.length > 0) {
      directors.forEach((directorItem) => {
        const directorOption = createElement("option", null, null);
        directorOption.value = directorItem.dirId;
        directorOption.innerHTML = directorItem.dirName;
        this.directorSelectElement.appendChild(directorOption);
      });
    }
  }

  populateStudioOptions(studios) {
    if (studios && studios.length > 0) {
      studios.forEach((studioItem) => {
        const studioOption = createElement("option", null, null);
        studioOption.value = studioItem.studId;
        studioOption.innerHTML = studioItem.studName;
        this.studioSelectElement.appendChild(studioOption);
      });
    }
  }
}

export default AddMovieView;
