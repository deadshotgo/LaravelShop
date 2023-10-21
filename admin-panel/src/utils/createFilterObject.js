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
      } else if(payloadKey === 'includes') {
        filters += `include=${payload[payloadKey].join(',')}`;
      } else if (payloadKey !== "limit" && payloadKey !== "page") {
        filters += `filter[${payloadKey}]=${payload[payloadKey]}&`;
      } else {
        payload[payloadKey] !== -1 ?
        filters += `${payloadKey}=${payload[payloadKey]}&` : '';
      }
    }
  }
  return filters;
};
