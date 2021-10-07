import tryJsonStringify from "./tryJsonStringify.js";

const postRequest = async (url, data) => {
  const response = await fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: tryJsonStringify(data),
  });
  return response;
};

export default postRequest;
