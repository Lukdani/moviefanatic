const tryJsonParse = (string) => {
  try {
    return JSON.parse(string);
  } catch (error) {
    console.log(error);
  }
};

export default tryJsonParse;
