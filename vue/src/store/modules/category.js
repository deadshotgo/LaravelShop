import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  categories: [],
};
const getters = {
  CATEGORIES: (state) => {
    return state.categories;
  },
};
const mutations = {
  SET_CATEGORY: (state, payload) => {
    state.categories = payload;
  },
};
const actions = {
  GET_CATEGORIES: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/categories?${filters}`);
    await context.commit("SET_CATEGORY", data.data.data);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
