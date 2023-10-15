import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  subCategories: [],
};
const getters = {
  SUB_CATEGORIES: (state) => {
    return state.subCategories;
  },
};
const mutations = {
  SET_SUB_CATEGORY: (state, payload) => {
    state.subCategories = payload
  },
};
const actions = {
  GET_SUB_CATEGORIES: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/sub-categories?${filters}`);
    await context.commit("SET_SUB_CATEGORY", data.data.data);
  },
  CREATE_SUB_CATEGORY: async (context, payload) => {
   await api.post(`/sub-categories`, payload);
  },
  UPDATE_SUB_CATEGORY: async (context, payload) => {
   await api.put(`/sub-categories/${payload.id}`, payload);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
