export const createFilterObject = (payload) => {
  let filters = "";
  for (const payloadKey in payload) {
    if (payloadKey === "paginate") {
      filters = payload[payloadKey];
    } else {
      if (payloadKey === "sorted") {
        for (const sortKey in payload[payloadKey]) {
          filters += payload[payloadKey][sortKey]
            ? `sort=${sortKey}&`
            : `sort=-${sortKey}&`;
        }
      } else if (payloadKey !== "limit") {
        filters += `filter[${payloadKey}]=${payload[payloadKey]}&`;
      } else {
        filters += `${payloadKey}=${payload[payloadKey]}&`;
      }
    }
  }
  return filters;
};
