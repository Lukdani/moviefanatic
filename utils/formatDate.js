export const formatDate = (date) => {
  if (date) {
    try {
      const dateToFormat = new Date(date);
      const year = dateToFormat.getFullYear();
      return year;
    } catch (err) {
      console.log(err);
    }
  }
};
