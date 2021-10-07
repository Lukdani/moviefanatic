const tryJsonStringify = (json) => {
  try {
    return JSON.stringify(json);
  } catch (error) {
    console.log(error);
  }
};

export default tryJsonStringify;
