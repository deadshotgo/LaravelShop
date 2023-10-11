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
    payload.forEach((e) => {
      e.subCategories = e.subCategories.data.length
    })
    state.categories = payload
  },
};
const actions = {
  GET_CATEGORIES: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/categories?${filters}`);
    await context.commit("SET_CATEGORY", data.data.data);
  },
  CREATE_CATEGORY: async (context, payload) => {
   await api.post(`/categories`, {name: payload.name, is_active: payload.isActive});
  },
  UPDATE_CATEGORY: async (context, payload) => {
   await api.put(`/categories/${payload.id}`, {name: payload.name, is_active: payload.isActive});
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
