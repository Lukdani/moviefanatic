const createElement = (tag, classes, id) => {
  const element = document.createElement(tag);
  if (classes)
    classes.forEach((classElement) => {
      element.classList.add(classElement);
    });
  if (id) element.setAttribute("id", id);

  return element;
};

export default createElement;
