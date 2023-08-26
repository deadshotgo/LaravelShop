import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  brands: [],
};
const getters = {
  BRANDS: (state) => {
    return state.brands;
  },
};
const mutations = {
  SET_BRAND: (state, payload) => {
    state.brands = payload;
  },
};
const actions = {
  GET_BRANDS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/brands?limit=${filters}`);
    await context.commit("SET_BRAND", data.data.data);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
