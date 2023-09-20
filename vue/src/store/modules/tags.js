import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  tags: [],
};
const getters = {
  TAGS: (state) => {
    return state.tags;
  },
};
const mutations = {
  SET_TAG: (state, payload) => {
    state.tags = payload;
  },
};
const actions = {
  GET_TAGS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/tags?${filters}`);
    await context.commit("SET_TAG", data.data.data);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
